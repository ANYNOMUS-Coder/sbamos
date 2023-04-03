//For File Explorer
var FL_EXPLR_QUERY = {};
var FL_EXPLR_FILETYPEARR = [];
var FL_EXPLR_FILESIZE = null;
var FL_EXPLR_FILEFOLDER = null;
var FL_EXPLR_FILENO = null;
var FL_EXPLR_SELECTED = [];
var FL_EXPLR_INPUT = null;
var FL_APPENDED_CNTR = null;
var ALLOWED_FILE_SIZE = 5242880;

var flExplorerModal = $('#file-uploads-explorer');

$(function () {
    $(document).on('change','#event-order [name="eventId"]', function(){
        var thisEl = $(this);
        var thisVal = thisEl.val();
        $('#event-order .event-info').html('<i class="spinner-border spinner-border-sm"></i>');
        $.ajax({
            type: "POST",
            url: MODULE_PATH + "/eventmanagement/controller/eventlist/get-event-info-order.php",
            data: {
                SourceForm:'getEventInfoForOrder',
                ajax:'1',
                event: thisVal,
                editid: thisEl.attr('data-editid')
            },
            catch: false,
            dataType: 'json',
            success: function (data) {
                if(data.typ==1)
                    $('#event-order .event-info').html(data.html);
                else
                    alert(data.msg);
            },
            error: function (data) {
                alert('Network error');
                $('#event-order .event-info').html('');
            }
        });
    })

    $(document).on('click','.list-item-fl .fl-item-view',function(){
        var thisEl= $(this);
        var url = thisEl.attr('data-url');
        var type = thisEl.attr('data-type');
        var caption = thisEl.attr('data-caption');
        Fancybox.show([{ src: url, type: type, caption: caption }]);
    })

    $(document).on('click','.list-item-fl .fl-item-remove',function(){
        var thisEl= $(this);
        thisEl.parent().parent().parent().next('.open-file-explorer').show();
        thisEl.parent().parent().remove();
    });

    $(document).on('click','#file-uploads-explorer .fl-select-cntr .fl-choose',function(){
        var elmnt = FL_APPENDED_CNTR.parent().find('.list-item-fl-list');
        if(FL_EXPLR_FILENO=='single' && elmnt.children().length>0) {
            alert('Only one file');
        }
        else {
            $.each(FL_EXPLR_SELECTED, function(key,value) {
                var fileId = generateRandomCode(10,'lower');
                var input = (FL_EXPLR_FILENO=='single') ? `<input type="hidden" name="`+FL_EXPLR_INPUT+`" value="`+value+`"/>` : `<input type="hidden" name="`+FL_EXPLR_INPUT+`[]" value="`+value+`"/>`;
                elmnt.append(`
                <div id="`+fileId+`" class="list-item-fl" style="background-image:url('`+SITE_LOC_PATH+`/templates/images/loading.png')">
                    <div class="btn-group">
                        <button data-url="" data-caption="Loading" class="btn btn-sm fl-item-view" type="button"><i class="ti-eye" aria-hidden="true"></i></button>
                        <button class="btn btn-sm fl-item-remove" type="button"><i class="ti-trash" aria-hidden="true"></i></button>
                    </div>
                    `+input+`
                </div>
                `);
                loadFileFlExplorer(fileId, value);
            });
        }

        if(FL_EXPLR_FILENO=='single' && elmnt.children().length>0) FL_APPENDED_CNTR.hide();

        flExplorerModal.modal("hide");
    })

    $(document).on('click','#file-uploads-explorer .fl-select-cntr .fl-delete',function(){
        
        if(FL_EXPLR_SELECTED.length) {
            var thisEl = $(this);
            var thisval = thisEl.html();
            thisEl.html('Wait.').attr('disabled','disabled');

            $.ajax({
                type: "POST",
                url: MODULE_PATH + "/filemanagement/controller/filelist/get-file.php",
                data: {
                    SourceForm:'deleteFile',
                    ajax:'1',
                    document: FL_EXPLR_SELECTED,
                    folder: FL_EXPLR_FILEFOLDER
                },
                catch: false,
                dataType: 'json',
                success: function (data) {
                    if(data.typ) {
                        initialiseFileExplorer(FL_EXPLR_QUERY);
                    }
                    else
                        alert(data.msg);
                },
                error: function (data) {
                    alert('Network error');
                }
            });
        }
        else
            alert('No file selected');
    })

    $(document).on('click','#file-uploads-explorer .page-records .fl-cntr>.thumbnail', function(e){
        e.preventDefault();
        var thisEl = $(this);
        var thisId = thisEl.attr('data-id');
        var fileLimit = (FL_EXPLR_FILENO=='single') ? 1 : 5
        
        var indexKey = FL_EXPLR_SELECTED.indexOf(thisId);
        if(indexKey>=0)
            FL_EXPLR_SELECTED.splice(indexKey, 1);
        else {
            if(FL_EXPLR_SELECTED.length<fileLimit) {
                FL_EXPLR_SELECTED.push(thisId);
            }
            else {
                if(FL_EXPLR_FILENO=='single')
                    FL_EXPLR_SELECTED = [thisId];
                else
                    alert('You can select maximum '+fileLimit+' file at a time');
            }
        }

        selectFile();
    })

    $(document).on('change','#fl-file-upload-input', function(event){
        const files = event.target.files;
        $.each(files, function(key,value) {

            var tmp_name = value.name,
            tmp_size = value.size,
            tmp_file = tmp_name.toLowerCase(),
            tmp_extension = tmp_file.substring(tmp_file.lastIndexOf('.') + 1),
            tmp_extn_arr = FL_EXPLR_FILETYPEARR;

            var extn_arr = [];
            $.each(tmp_extn_arr, function(index, item) {
                $.each(item, function(indexx, itemm) {
                    extn_arr.push(itemm);
                });
            });

            // console.log(tmp_extension)
            // console.log(extn_arr)

            if(tmp_size>ALLOWED_FILE_SIZE) {
                swal("Large file!", "Upload a file under "+formatBytes(ALLOWED_FILE_SIZE)+"!", "error");
            }
            else if($.inArray(tmp_extension, extn_arr) == -1) {
                swal("Invalid file!", "Upload a valid file of "+extn_arr.join(', '), "error");
            }
            else
                uploadFileFileExplorer(value);
        });
        $('#fl-explr-upload-form')[0].reset();
    })

    $(document).on('change','#fl-explorer-flsize',function(){
        var thisVal = $(this).val();
        FL_EXPLR_FILESIZE = thisVal;
        $("#file-uploads-explorer").find('#modal-body').find('.page-records').find('.fl-cntr .thumbnail').hide();
        $("#file-uploads-explorer").find('#modal-body').find('.page-records').find('.fl-cntr .thumbnail[data-size="'+thisVal+'"], .fl-cntr .thumbnail[data-size="all"]').show();
    })

    // $("#file-uploads-explorer .nav-tabs a").click(function(){
    //     $(this).tab('show');
    // });

    $('button[data-bs-toggle="tab"].flexplrtab').on('show.bs.tab', function (event) {
        // console.log(event.target.id) // newly activated tab
        // event.relatedTarget // previous active tab

        if(event.target.id=='fl-list-tab') initialiseFileExplorer(FL_EXPLR_QUERY);
    });

    $(document).on('click','.open-file-explorer', function(){
        
        var thisEl = $(this);
        var thisFolder = thisEl.attr('data-folder');
        var thisInput = thisEl.attr('data-input');
        var thisFlno = thisEl.attr('data-fileno');
        var thisFile = JSON.parse(thisEl.attr('data-file'));
        var thisSize = thisEl.attr('data-size');

        FL_EXPLR_FILENO         = thisFlno;
        FL_EXPLR_FILEFOLDER     = thisFolder;
        FL_EXPLR_FILETYPEARR    = thisFile;
        FL_EXPLR_FILESIZE       = thisSize;
        FL_EXPLR_INPUT          = thisInput;
        FL_APPENDED_CNTR        = thisEl;

        switch (thisFolder) {
            case 'event':
                FL_EXPLR_QUERY['docType'] = 'EVENT';
                break;
            case 'document':
                FL_EXPLR_QUERY['docType'] = 'ID_PROOF';
                break;
            case 'profile':
                FL_EXPLR_QUERY['docType'] = 'PROFILE_IMAGE';
                break;
        }

        flExplorerModal.modal("show");

        $("#file-uploads-explorer").find('#fl-type').html('<div class="fl-menuul"></div>');
        $("#file-uploads-explorer").find('#fl-type .fl-menuul').append(`
            <div class="fl-menuli radiobtn">
                <input type="radio" id="fileTypeall" name="fileType" value="all" checked onclick="onClickFileType('all')"  />
                <label for="fileTypeall">All</label>
            </div>
        `);
        $.each(FL_EXPLR_FILETYPEARR, function(key,value) {
            $("#file-uploads-explorer").find('#fl-type .fl-menuul').append(`
                <div class="fl-menuli radiobtn" >
                    <input type="radio" id="fileType`+key+`" name="fileType" value="`+key+`" onclick="onClickFileType('`+key+`')" />
                    <label for="fileType`+key+`">`+key.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                        return letter.toUpperCase();
                    })+`</label>
                </div>
            `);
        })
        $("#file-uploads-explorer").find('#fl-type .fl-menuul').append(`
            <div class="fl-menuli radiobtn">
                <input type="radio" id="fileTypeother" name="fileType" value="other" onclick="onClickFileType('other')" />
                <label for="fileTypeother">Others</label>
            </div>
        `);

        FL_EXPLR_QUERY['fileType'] = 'all';
        initialiseFileExplorer(FL_EXPLR_QUERY);
        
    });

    flExplorerModal.on('show.bs.modal', function (event) {
        $("#file-uploads-explorer").find('#modal-body').html(`
        <div class="text-center">
            <i class="spinner-border spinner-border-sm"></i>
            <span class="sr-only">Loading...</span>
        </div>
        `);
        $('.fl-upload-listul').html('');
    });

    flExplorerModal.on('hidden.bs.modal', function (event) {
        FL_EXPLR_QUERY = {};
        FL_EXPLR_FILETYPEARR = [];
        FL_EXPLR_FILESIZE = null;
        FL_EXPLR_FILEFOLDER = null;
        FL_EXPLR_FILENO = null;
        FL_EXPLR_SELECTED = [];
        FL_EXPLR_INPUT = null;
        FL_APPENDED_CNTR = null;

        $("#file-uploads-explorer").find('#modal-body').html(`
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="flexplrtab nav-link active" id="fl-list-tab" data-bs-toggle="tab" data-bs-target="#fl-list" type="button" role="tab" aria-controls="fl-list" aria-selected="true">Gallery</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="flexplrtab nav-link fla" id="fl-upload-tab" data-bs-toggle="tab" data-bs-target="#fl-upload" type="button" role="tab" aria-controls="fl-upload" aria-selected="false">Upload</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="fl-list" role="tabpanel" aria-labelledby="fl-list-tab">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fl-type" id="fl-type"></div>
                        </div>
                        <div class="col-md-9">
                            <div class="fl-cntr-list" id="modal-body"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="fl-upload" role="tabpanel" aria-labelledby="fl-upload-tab">
                    <h3>Upload</h3>
                    <form id="fl-explr-upload-form" enctype="multipart/form-data">
                        <div class="fl-upload-cntr">
                            <i class="ti-cloud-up icon-lg text-muted" aria-hidden="true"></i>
                            <input type="file" id="fl-file-upload-input" name="file" multiple>
                        </div>
                    </form>
                    <div class="fl-upload-list">
                        <ul class="fl-upload-listul"></ul>
                    </div>
                </div>
            </div>
        `);
        $("#file-uploads-explorer").find('#modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><div class="fl-select-cntr"></div>');
    });   
});

function formatBytes(bytes, decimals = 2) {
    if (!+bytes) return '0 Bytes'

    const k = 1024
    const dm = decimals < 0 ? 0 : decimals
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']

    const i = Math.floor(Math.log(bytes) / Math.log(k))

    return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`
}

function initiateList(
    table,
    ExtraQryStr,
    niddle,
    callback=false
) {
    $.ajax({
        type: "POST",
        url: MODULE_PATH + "/filemanagement/controller/filelist/get-record-page.php",
        data: {
            SourceForm:'getRecordNo',
            ajax:'1',
            table:table,
            ExtraQryStr: ExtraQryStr,
            niddle:niddle
        },
        catch: false,
        dataType: 'json',
        success: function (data) {
            if(callback) callback(data);
        },
        error: function (data) {
            alert('Network error');
        }
    });
}

function fetchList(
    table,
    ExtraQryStr,
    fetchField,
    page,
    limit,
    orderBy,
    callback=false
) {
    $.ajax({
        type: "POST",
        url: MODULE_PATH + "/filemanagement/controller/filelist/get-record-page.php",
        data: {
            SourceForm:'getRecordList',
            ajax:'1',
            table:table,
            ExtraQryStr: ExtraQryStr,
            fetchField:fetchField,
            page:page,
            limit:limit,
            orderBy: orderBy,
            folder: FL_EXPLR_FILEFOLDER
        },
        catch: false,
        dataType: 'json',
        success: function (data) {
            if(callback) callback(data);
        },
        error: function (data) {
            alert('Network error');
        }
    });
}

function loadRecords(
    thisEl,
    table,
    ExtraQryStr,
    fetchField,
    page,
    limit,
    orderBy
) {
    FL_EXPLR_SELECTED = [];
    selectFile();
    
    var ExtraQryStr = atob(ExtraQryStr);
    $("#file-uploads-explorer").find('#modal-body').find('.page-records').html(`
    <div class="text-center">
        <i class="spinner-border spinner-border-sm"></i>
        <span class="sr-only">Loading...</span>
    </div>
    `);
    $("#file-uploads-explorer").find('#modal-body').find('.page-ulli').find('.pagination').children().removeClass('active');
    fetchList(table,ExtraQryStr,fetchField,page,limit,orderBy,function(data){
        if(thisEl && thisEl.length) thisEl.parent().addClass('active');
        var SIZE_OPTN_ARR = '';
        $.each(IMG_SIZE_ARR, function (keys,vals) {
            var SLTD_SIZE = (vals==FL_EXPLR_FILESIZE) ? 'selected' : '';
            SIZE_OPTN_ARR += '<option '+SLTD_SIZE+' value="'+vals+'">'+vals+'</option>';
        });
        $("#file-uploads-explorer").find('#modal-body').find('.page-records').html(`<div class="row">
            <div class="col-md-12">
                <div class="form-group float-end">
                    <select class="form-control" id="fl-explorer-flsize">
                        `+SIZE_OPTN_ARR+`
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="fl-cntr"></div>
            </div>
        </div>`);
        if(data.record.length) {
            data.record.map(function(valueArr){
                var thumbnail = '';
                if(typeof valueArr['fileUrl'] === 'object' && valueArr['fileUrl'] !== null) {
                    $.each(valueArr['fileUrl'], function (key, val) {
                        var showHide = (key==FL_EXPLR_FILESIZE) ? '' : 'style="display:none"';
                        thumbnail += `
                        <div 
                            class="thumbnail card" 
                            data-id="`+valueArr.id+`"
                            data-size="`+key+`" `+showHide+`>
                                <img class="card-img-top" src="`+val+`">
                                <div class="card-body">
                                    <h6 class="card-title m-0">`+valueArr.orgName+`</h6>
                                    <p class="card-text">`+valueArr.fileSize+`</p>
                                </div>
                        </div>
                        `;
                    });
                }
                else {
                    thumbnail += `
                    <div 
                        class="thumbnail card" 
                        data-id="`+valueArr.id+`"
                        data-size="all">
                            <img class="card-img-top" src="`+valueArr['fileUrl']+`">
                            <div class="card-body">
                                <h6 class="card-title fs-6 m-0">`+valueArr.orgName+`</h6>
                                <p class="card-text">`+valueArr.fileSize+`</p>
                            </div>
                    </div>
                    `;
                }
                $("#file-uploads-explorer").find('#modal-body').find('.page-records').find('.fl-cntr').append(`
                    `+thumbnail+`
                `);
            })
        }
        else
            $("#file-uploads-explorer").find('#modal-body').find('.page-records').html('<p>No Records found!</p>');
    });
}

function initialiseFileExplorer(ExtraQryStrArr) {
    // console.log(ExtraQryStrArr);
    
    var table       = 'tbl_clients_image';
    var niddle      = 'id';

    // Process Str from Array
    var TmpArr = [];
    $.each(ExtraQryStrArr, function(key,value) {
        if(value) {
            if(key=='fileType' && value=='other') {
                let TmpKeys = [];
                $.each(FL_EXPLR_FILETYPEARR, function(key,value) {
                    TmpKeys.push(key);
                });
                TmpArr.push('('+key+' NOT IN ("'+TmpKeys.join('","')+'") OR '+key+' IS NULL)');
            }
            else if(key=='fileType' && value=='all') {
                let TmpKeys = [];
                $.each(FL_EXPLR_FILETYPEARR, function(key,value) {
                    TmpKeys.push(key);
                });
                TmpArr.push(key+' IN ("'+TmpKeys.join('","')+'")');
            }
            else
                TmpArr.push(key+'="'+value+'"');
        }
    });
    var ExtraQryStr = TmpArr.join(' AND ');

    // alert(ExtraQryStr);
    
    initiateList(table,ExtraQryStr,niddle,function (data) {

        var totalRecord = parseInt(data.record);
        var totalPages = Math.ceil(totalRecord / ADMINPEGINATION); 
        var fetchField='*';
        var limit=ADMINPEGINATION;
        var orderBy = 'ORDER BY id DESC';
        var paginationHtml = '';
        if(totalPages) {
            paginationHtml += '<div class="page-ulli"><ul class="pagination justify-content-end mt-4">';
            for (let index = 1; index <= totalPages; index++) {
                if(index == 1) 
                    paginationHtml += '<li class="page-item active"><a class="page-link" id="firstliulpage" href="javascript:void(0);" onClick="loadRecords($(this),\''+table+'\',\''+btoa(ExtraQryStr)+'\',\''+fetchField+'\',\''+index+'\',\''+limit+'\',\''+orderBy+'\')">'+index+'</a></li>';
                else
                    paginationHtml += '<li class="page-item"><a class="page-link" href="javascript:void(0);" onClick="loadRecords($(this),\''+table+'\',\''+btoa(ExtraQryStr)+'\',\''+fetchField+'\',\''+index+'\',\''+limit+'\',\''+orderBy+'\')">'+index+'</a></li>';
            }
            paginationHtml += '</ul></div>';
        }
        $("#file-uploads-explorer").find('#modal-body').html(`
        <div class="page-records">
            <div class="text-center">
                <span class="spinner-grow"></span>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        `+paginationHtml);
        var page=1;
        var thisEl = $("#file-uploads-explorer").find('#firstliulpage');
        loadRecords(
            thisEl,
            table,
            btoa(ExtraQryStr),
            fetchField,
            page,
            limit,
            orderBy
        );
    });
}

function onClickFileType(selected_value) {
    FL_EXPLR_QUERY['fileType'] = selected_value;
    initialiseFileExplorer(FL_EXPLR_QUERY);
}

function uploadFileFileExplorer(file) {
    const formData = new FormData();
    formData.append('file', file);
    formData.append("SourceForm", 'uploadFileFileExplorer');
    formData.append("ajax", "1");
    formData.append("folder", FL_EXPLR_FILEFOLDER);
    formData.append("fileType", JSON.stringify(FL_EXPLR_FILETYPEARR));
    var fileId = generateRandomCode(10,'lower');
    $('.fl-upload-listul').append(`
        <li id="`+fileId+`">
            <h6>`+file.name+` (`+file.size+`)</h6>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                    <span class="sr-only">0%</span>
                </div>
            </div>
            <div class="fl-upload-status"></div>
        </li>
    `);
    $.ajax({
        url: MODULE_PATH + "/filemanagement/controller/filelist/upload.php",
        type: 'POST',
        xhr: function() {
            var myXhr = xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener('loadstart', function (event) {
                $('#'+fileId+' .fl-upload-status').html('Upload has started.');
            }, false);
            xhr.upload.addEventListener('progress', function (event) {
                if (event.lengthComputable) {
                    var loaded = event.loaded;
                    var total = event.total;
                    var progressValue = Math.round((loaded / total) * 100);
                    // console.log(progressValue);
                    $('#'+fileId).find('.progress>.progress-bar').css({
                        'width': progressValue + '%'
                    }).html(progressValue + '%');

                    var uploadedBytes = loaded / total;
                    $('#'+fileId+' .fl-upload-status').html(`<i class="spinner-border spinner-border-sm"></i> Uploading ${uploadedBytes}/${file.size} bytes`);
                }
            }, false);
            xhr.upload.addEventListener('load', function (event) {
                $('#'+fileId+' .fl-upload-status').html('Uploaded. Processing <i class="spinner-border spinner-border-sm"></i>');
            }, false);
            xhr.upload.addEventListener('error', function (event) {
                $('#'+fileId+' .fl-upload-status').html(`Error during the upload: ${xhr.status}.`);
                $('#'+fileId).find('.progress>.progress-bar').addClass('bg-danger');
            }, false);


            return myXhr;
        },
        success: function (data) {
            if(data.typ) {
                $('#'+fileId).find('.progress>.progress-bar').addClass('bg-success');
                $('#'+fileId+' .fl-upload-status').html(data.msg);
            }
            else {
                $('#'+fileId+' .fl-upload-status').html(data.msg);
                $('#'+fileId).find('.progress>.progress-bar').addClass('bg-danger');
            }
        },
        error: function () {
            $('#'+fileId+' .fl-upload-status').html('Upload server error!');
            $('#'+fileId).find('.progress>.progress-bar').addClass('bg-danger');
        },
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false
    });
}

function selectFile() {
    var allelmnt = $('#file-uploads-explorer .page-records .fl-cntr>.thumbnail');
    allelmnt.removeClass('selected');
    $.each(FL_EXPLR_SELECTED, function(key,value) {
        var elmnt = $('#file-uploads-explorer .page-records .fl-cntr>.thumbnail[data-id="'+value+'"]');
        elmnt.addClass('selected');
    });

    if(FL_EXPLR_SELECTED.length)
        $('.fl-select-cntr').html(`
            <span>`+FL_EXPLR_SELECTED.length+`</span> Selected
            <button type="button" class="btn btn-danger fl-delete">Delete</button>
            <button type="button" class="btn btn-primary fl-choose">Choose</button>
        `);
    else
        $('.fl-select-cntr').html('');
}

function loadFileFlExplorer(fileId,id) {
    $.ajax({
        type: "POST",
        url: MODULE_PATH + "/filemanagement/controller/filelist/get-file.php",
        data: {
            SourceForm:'getFileInfo',
            ajax:'1',
            document: id,
            folder: FL_EXPLR_FILEFOLDER
        },
        catch: false,
        dataType: 'json',
        success: function (data) {
            // console.log(data);
            if(data.typ) {
                $('#'+fileId).css({'background-image':'url('+data.url+')'});
                $('#'+fileId).find('.fl-item-view').attr('data-url',data.mainurl).attr('data-type',data.type).attr('data-caption',data.name);
            }
            else
                console.log(data.msg);
        },
        error: function (data) {
            alert('Network error');
        }
    });
}
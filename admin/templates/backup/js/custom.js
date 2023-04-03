var usersearch = null;
var evcatsearch = null;

//For File Explorer
var FL_EXPLR_QUERY = {};
var FL_EXPLR_FILETYPEARR = [];
var FL_EXPLR_FILESIZE = null;
var FL_EXPLR_FILEFOLDER = null;
var FL_EXPLR_FILENO = null;
var FL_EXPLR_SELECTED = [];
var FL_EXPLR_INPUT = null;
var FL_APPENDED_CNTR = null;

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
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
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
                <div class="form-group pull-right">
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
                            class="thumbnail" 
                            data-id="`+valueArr.id+`"
                            data-size="`+key+`" `+showHide+`>
                            <a href="javascript:void(0);" target="_blank">
                                <img src="`+val+`" style="width:100%">
                                <div class="caption">
                                    <p>`+valueArr.orgName+`</p>
                                </div>
                            </a>
                        </div>
                        `;
                    });
                }
                else {
                    thumbnail += `
                    <div 
                        class="thumbnail" 
                        data-id="`+valueArr.id+`"
                        data-size="all">
                        <a href="javascript:void(0);" target="_blank">
                            <img src="`+valueArr['fileUrl']+`" style="width:100%">
                            <div class="caption">
                                <p>`+valueArr.orgName+`</p>
                            </div>
                        </a>
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
    console.log(ExtraQryStrArr);
    
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
            paginationHtml += '<div class="page-ulli"><ul class="pagination text-center">';
            for (let index = 1; index <= totalPages; index++) {
                if(index == 1) 
                    paginationHtml += '<li class="active"><a id="firstliulpage" href="javascript:void(0);" onClick="loadRecords($(this),\''+table+'\',\''+btoa(ExtraQryStr)+'\',\''+fetchField+'\',\''+index+'\',\''+limit+'\',\''+orderBy+'\')">'+index+'</a></li>';
                else
                    paginationHtml += '<li><a href="javascript:void(0);" onClick="loadRecords($(this),\''+table+'\',\''+btoa(ExtraQryStr)+'\',\''+fetchField+'\',\''+index+'\',\''+limit+'\',\''+orderBy+'\')">'+index+'</a></li>';
            }
            paginationHtml += '</ul></div>';
        }
        $("#file-uploads-explorer").find('#modal-body').html(`
        <div class="page-records">
            <div class="text-center">
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
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
                    console.log(progressValue);
                    $('#'+fileId).find('.progress>.progress-bar').css({
                        'width': progressValue + '%'
                    }).html(progressValue + '%');

                    var uploadedBytes = loaded / total;
                    $('#'+fileId+' .fl-upload-status').html(`<i class="fa fa-spinner fa-pulse"></i> Uploading ${uploadedBytes}/${file.size} bytes`);
                }
            }, false);
            xhr.upload.addEventListener('load', function (event) {
                $('#'+fileId+' .fl-upload-status').html('Uploaded. Processing <i class="fa fa-spinner fa-pulse"></i>');
            }, false);
            xhr.upload.addEventListener('error', function (event) {
                $('#'+fileId+' .fl-upload-status').html(`Error during the upload: ${xhr.status}.`);
                $('#'+fileId).find('.progress>.progress-bar').addClass('progress-bar-danger');
            }, false);


            return myXhr;
        },
        success: function (data) {
            if(data.typ) {
                $('#'+fileId).find('.progress>.progress-bar').addClass('progress-bar-success');
                $('#'+fileId+' .fl-upload-status').html(data.msg);
            }
            else {
                $('#'+fileId+' .fl-upload-status').html(data.msg);
                $('#'+fileId).find('.progress>.progress-bar').addClass('progress-bar-danger');
            }
        },
        error: function () {
            $('#'+fileId+' .fl-upload-status').html('Upload server error!');
            $('#'+fileId).find('.progress>.progress-bar').addClass('progress-bar-danger');
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
            console.log(data);
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



! function ($) { 

    $(document).on('change','#event-order [name="eventId"]', function(){
        var thisEl = $(this);
        var thisVal = thisEl.val();
        $('#event-order .event-info').html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');
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
                        <button data-url="" data-caption="Loading" class="btn btn-sm fl-item-view" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        <button class="btn btn-sm fl-item-remove" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>
                    `+input+`
                </div>
                `);
                loadFileFlExplorer(fileId, value);
            });
        }

        if(FL_EXPLR_FILENO=='single' && elmnt.children().length>0) FL_APPENDED_CNTR.hide();

        $("#file-uploads-explorer").modal("hide");
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

    $("#file-uploads-explorer .nav-tabs a").click(function(){
        $(this).tab('show');
    });
    $('#file-uploads-explorer .nav-tabs a[href="#fl-list"]').on('show.bs.tab', function(){
        initialiseFileExplorer(FL_EXPLR_QUERY);
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

        $("#file-uploads-explorer").modal({show: true, backdrop: 'static'});

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

    $("#file-uploads-explorer").on('show.bs.modal', function(e){
        $("#file-uploads-explorer").find('#modal-body').html(`
        <div class="text-center">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </div>
        `);
        $('.fl-upload-listul').html('');
    });

    $("#file-uploads-explorer").on('hidden.bs.modal', function(e){
        FL_EXPLR_QUERY = {};
        FL_EXPLR_FILETYPEARR = [];
        FL_EXPLR_FILESIZE = null;
        FL_EXPLR_FILEFOLDER = null;
        FL_EXPLR_FILENO = null;
        FL_EXPLR_SELECTED = [];
        FL_EXPLR_INPUT = null;
        FL_APPENDED_CNTR = null;

        $("#file-uploads-explorer").find('#modal-body').html(`
            <ul class="nav nav-tabs">
                <li class="active"><a class="fla" href="#fl-list">Gallery</a></li>
                <li><a class="fla" href="#fl-upload">Upload</a></li>
            </ul>
            <div class="tab-content">
                <div id="fl-list" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fl-type" id="fl-type"></div>
                        </div>
                        <div class="col-md-9">
                            <div class="fl-cntr-list" id="modal-body"></div>
                        </div>
                    </div>
                </div>
                <div id="fl-upload" class="tab-pane fade">
                    <h3>Upload</h3>
                    <form id="fl-explr-upload-form" enctype="multipart/form-data">
                        <div class="fl-upload-cntr">
                            <i class="fa fa-cloud-upload fa-2x text-info" aria-hidden="true"></i>
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

    $(document).on('click','.add-event-time',function(){
        $(this).parents('.rowindv').after(`
        <div class="row rowindv">
            <div class="col-xs-5">
                <input class="form-control timepicker" type="text" name="startTime[]" placeholder="Start Time">
            </div>
            <div class="col-xs-5">
                <input class="form-control timepicker" type="text" name="endTime[]" placeholder="End Time">
            </div>
            <div class="col-xs-2 text-right">
                <button type="button" class="btn btn-info btn-sm add-event-time">+</button>
                <button type="button" class="btn btn-danger btn-sm remove-event-time">X</button>
            </div>
        </div>
        `);
        $('.timepicker').datetimepicker({  
            format:'HH:mm:ss'
        }); 
    })

    $(document).on('click','.remove-event-docbring',function(){
        $(this).parents('.rowindv').remove();
    })

    $(document).on('click','.add-event-docbring',function(){
        $(this).parents('.rowindv').after(`
        <div class="row rowindv">
            <div class="col-xs-10">
                <input class="form-control" type="text" name="participantBrings[]" placeholder="What to bring">
            </div>
            <div class="col-xs-2 text-right">
                <button type="button" class="btn btn-info btn-sm add-event-docbring">+</button>
                <button type="button" class="btn btn-danger btn-sm remove-event-docbring">X</button>
            </div>
        </div>
        `);
    })

    $(document).on('click','.remove-event-price',function(){
        $(this).parents('.rowindv').remove();
    })

    $(document).on('click','.add-event-price',function(){
        var rowPrcNo = $('.repeat-event-price-row').children().length;
        if(rowPrcNo<=4) {
            $(this).parents('.rowindv').after(`
            <div class="row rowindv">
                <div class="col-xs-3">
                    <input class="form-control" type="text" name="priceText[]" placeholder="Price Text">
                </div>
                <div class="col-xs-3">
                    <input class="form-control" type="number" name="printedPrice[]" placeholder="Printed Price">
                </div>
                <div class="col-xs-3">
                    <input class="form-control" type="number" name="sellingPrice[]" placeholder="Selling Price">
                </div>
                <div class="col-xs-3 text-right">
                    <button type="button" class="btn btn-info btn-sm add-event-price">+</button>
                    <button type="button" class="btn btn-danger btn-sm remove-event-price">X</button>
                </div>
            </div>
            `);
        }
        else
            alert('Maximum 5');
    })    

    $(document).on('click','.remove-event-time',function(){
        $(this).parents('.rowindv').remove();
    })

    $(document).on('change','input[name="profileType"]',function(){
        var val = $('input[name=profileType]:checked').val();
        $('.panel-profile').removeClass('open disabled').addClass('open').find('input, select, textarea').removeAttr('disabled');
        $('.panel-profile.pp-'+val).addClass('disabled').find('input, select, textarea').attr('disabled','disabled');
    })

    $(document).on('change','input[name="isRecurring"]',function(){
        var val = $('input[name=isRecurring]:checked').val();
        $('.panel-recurring-event').removeClass('open disabled').addClass('open').find('input, select, textarea').removeAttr('disabled');
        $('.panel-recurring-event.re-'+val).addClass('disabled').find('input, select, textarea').attr('disabled','disabled');
    })

    $(document).on('change','input[name="eventAddressType"]',function(){
        var val = $('input[name=eventAddressType]:checked').val();
        $('.panel-address-event').removeClass('open disabled').addClass('open').find('input, select, textarea').removeAttr('disabled');
        $('.panel-address-event.re-'+val).addClass('disabled').find('input, select, textarea').attr('disabled','disabled');
    })

    $(document).on('change','input[name="eventPriceType"]',function(){
        var val = $('input[name=eventPriceType]:checked').val();
        $('.panel-price-event').removeClass('open disabled').addClass('open').find('input, select, textarea').removeAttr('disabled');
        $('.panel-price-event.re-'+val).addClass('disabled').find('input, select, textarea').attr('disabled','disabled');
    })

    $(".navbar-toggle").click(function(){
        if($(".sidebar-cstms").hasClass("collapse-it"))
        {
            $(".sidebar-cstms").removeClass("collapse-it")
            $(".dashboard-all-content").removeClass("enlarge")
        }
        else
        {
            $(".sidebar-cstms").addClass("collapse-it")
            $(".dashboard-all-content").addClass("enlarge")
        }
    });

    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    $('.tree li.parent_li > span:not(.input-group)').on('click', function (e) {
        if(e.target.className != 'no-click') {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(":visible")) {
                children.hide('fast');
                $(this).attr('title', 'Expand this branch').find(' > i').addClass('fa-plus-square').removeClass('fa-minus-square');
            } else {
                children.show('fast');
                $(this).attr('title', 'Collapse this branch').find(' > i').addClass('fa-minus-square').removeClass('fa-plus-square');
            }
            e.stopPropagation();
        }
    });

    $(document).on('click','.changecomm-btn',function(e){
        e.preventDefault();
        var thisEl = $(this);
        thisEl.attr('disabled','disabled').html('<i class="fa fa-spinner fa-pulse"></i>');
        var accountId = thisEl.attr('data-account');
        var accountComm = thisEl.prev('.changecomm-txt').val();
        $.ajax({
            type: "POST",
            url: MODULE_PATH + "/siteuserdashboard/controller/mtaccount/change-wdth-request-status.php",
            data: {SourceForm:'updateCommAccount',ajax:'1',accountId:accountId,accountComm:accountComm},
            catch: false,
            dataType: 'json',
            success: function (data) {
                thisEl.removeAttr('disabled').html('Update');
                if(data.typ=='success') location.reload();
                else alert(data.msg);
            },
            error: function (data) {
                thisEl.removeAttr('disabled').html('Update');
                alert('Network error');
            }
        });
    })

    usersearch = $('.usersearch').select2({
        allowClear: true,
        placeholder: 'Type ID / Name / Email',
        ajax: {
            url: MODULE_PATH + "/siteusermanagement/controller/clientlist/autocomplete.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    SourceForm: 'searchUser',
                    searchTerm: params.term,
                    page: params.page || 1
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.results,
                    pagination: {
                        more: (params.page * 10) < data.count_filtered
                    }
                };
            },
            cache: true
        },
        templateResult: autoSearchTmpl,
    });

    function autoSearchTmpl (repo) {
        console.log(repo)
        if (repo.loading) {
            return repo.text;
        }
    
        var $container = $(
        "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar'><img src='" + repo.image + "' /></div>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'></div>" +
            "<div class='select2-result-repository__description'></div>" +
            "<div class='select2-result-repository__statistics'>" +
                "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>" +
                // "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>" +
                // "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>" +
            "</div>" +
            "</div>" +
        "</div>"
        );
    
        $container.find(".select2-result-repository__title").text(repo.heading);
        $container.find(".select2-result-repository__description").text(repo.description);
        $container.find(".select2-result-repository__forks").append(repo.deletedHtml);
        // $container.find(".select2-result-repository__stargazers").append(repo.stargazers_count + " Stars");
        // $container.find(".select2-result-repository__watchers").append(repo.watchers_count + " Watchers");
    
        return $container;
    }

    evcatsearch = $('.evcatsearch').select2({
        allowClear: true,
        placeholder: 'Choose Event Category',
        ajax: {
            url: MODULE_PATH + "/eventmanagement/controller/eventcategory/autocomplete.php",
            dataType: 'json',
            delay: 250,
            data: function (data) {
                return {
                    SourceForm: 'searchEventCat',
                    searchTerm: data.term // search term
                };
            },
            processResults: function (response) {
                return {
                    results:response
                };
            },
            cache: true
        }
    });

    evcatsearch = $('.eventsearch').select2({
        allowClear: true,
        placeholder: 'Choose Event Category',
        ajax: {
            url: MODULE_PATH + "/eventmanagement/controller/eventlist/autocomplete.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    SourceForm: 'searchEvent',
                    searchTerm: params.term,
                    page: params.page || 1
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.results,
                    pagination: {
                        more: (params.page * 10) < data.count_filtered
                    }
                };
            },
            cache: true
        },
        templateResult: autoSearchTmpl,
    });
    
    $(document).on('change','#requestStatus',function(e){
        var thisEl  = $(this);
        var thisVal = thisEl.val();
        var wRqstId = thisEl.attr('data-id');
        $.ajax({
            type: "POST",
            url: MODULE_PATH + "/siteuserdashboard/controller/mtaccount/change-wdth-request-status.php",
            data: {SourceForm:'changeRequestWdthStatus',ajax:'1',request:thisVal,wRqstId:wRqstId},
            catch: false,
            dataType: 'json',
            success: function (data) {
                location.reload();
            },
            error: function (data) {
                alert('Network error');
            }
        });
    })

    $(document).on('click','.cde',function(e){
        e.preventDefault();
        var form = $("#trgtForm");
        form.find('#empresult').html('');
        form.find('.cde').hide();
        form.find('input[name="SourceForm"]').val('selectemp');
        form.find('input[name="amount"]').removeAttr('readonly');
        form.find('input[name="activationNo"]').removeAttr('readonly');
        form.find('.conMsg').html('');
        $('.tgt-display').hide();
    });
    $("#trgtForm").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var btnEl = form.find('[type="submit"]');
        var btnVal = btnEl.html();
        var formVal = form.serialize();
        var msgBox = form.find('.conMsg');
        msgBox.html('Please Wait');
        btnEl.html('Please Wait...');
        btnEl.attr('disabled','disabled');

        $.ajax({
            type: "POST",
            url: MODULE_PATH + "/employeemanagement/controller/targetlist/action.php",
            data: formVal,
            catch: false,
            dataType: 'json',
            success: function (data) {
                msgBox.html(data.msg);
                btnEl.removeAttr('disabled');
                btnEl.html(btnVal);
                if(data.typ=='success') {
                    $('#empresult').html(data.tmp);
                    form.find('input[name="SourceForm"]').val('targetForm');
                    form.find('input[name="amount"]').attr('readonly','readonly');
                    form.find('input[name="activationNo"]').attr('readonly','readonly');
                    form.find('.cde').show();
                    sinkAllTarget();
                }
            },
            error: function (data) {
                btnEl.removeAttr('disabled');
                msgBox.html('Network error');
                btnEl.html(btnVal);
            }
        });
    });
    $('[data-toggle="tooltip"]').tooltip(); 
    $('#calendar, #calendar2, #calendar3, #calendar4').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
    $('.timepicker').datetimepicker({  
        format:'HH:mm:ss'
    }); 
    $(document).on('click','#thisd',function(){
        var form = $(this).parent();

        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();

        var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;

        form.find('[name="sd"]').val(output);
        form.find('[name="ed"]').val(output);
        form.submit();
    });
    $(document).on('click','#thism',function(){
        var form = $(this).parent();

        var date = new Date();
        var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

        var month = firstDay .getMonth() + 1;
        var day = firstDay .getDate();
        var year = firstDay .getFullYear();
        var output = year + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;

        var lmonth = lastDay .getMonth() + 1;
        var lday = lastDay .getDate();
        var lyear = lastDay .getFullYear();
        var loutput = lyear + '-' + (lmonth<10 ? '0' : '') + lmonth + '-' + (lday<10 ? '0' : '') + lday;

        form.find('[name="sd"]').val(output);
        form.find('[name="ed"]').val(loutput);
        form.submit();
    });

    $(document).on('change','#select-oth, #select-fromacc-oth, #select-toacc-oth',function(){
        var link = $(this);
        var thisval = link.val();
        var thisTyp = link.attr('data-typ');
        if(thisval=='OTH') {
            $.ajax({
                url     :MODULE_PATH+'/expance/controller/expancelist/action.php',
                type    : "POST",
                data    : {
                    'ajax':1,
                    'SourceForm':'expanceType',
                    'type':thisTyp
                },
                cache   : false,
                success(data)
                {
                    $('#'+thisTyp).html(data);
                }
            });
        }
    });
    $('.repeater-field').each(function(){
        var repeater = $(this);
        var addbtn = repeater.find('.add-row');
        var dltbtn = repeater.find('a[href="delete-row"]');
        var repeaterCntr = repeater.find('ul');
        var firstLi = repeaterCntr.children(':first-child');
        addbtn.click(function(){
            repeaterCntr.append('<li class="list-group-item">'+firstLi.html()+'</li>');
            repeaterCntr.children(':last-child').find('[type="text"]').val('');
        })
    });
    if($( "#sortable-1" ).length>0 && $( "#sortable-11" ).length>0 ){  
        $( "#sortable-1, #sortable-11" ).sortable({
            connectWith: "#sortable-1, #sortable-11",
            update: function(event, ui) {
                var productOrder = $('#sortable-11').sortable('toArray').toString();
                $('input[name="bottomContent"]').val(productOrder);
            }
        });
	}
	if($( "#sortable-2" ).length>0 && $( "#sortable-22" ).length>0 ){
        $( "#sortable-2, #sortable-22" ).sortable({
            connectWith: "#sortable-2, #sortable-22",
            update: function(event, ui) {
                var productOrder = $('#sortable-22').sortable('toArray').toString();
                $('input[name="sideContent"]').val(productOrder);
            }
        });
    }
    $( "#sortable" ).sortable({
        update: function(event, ui) {
            var order   = $( "#sortable" ).sortable('toArray').toString(),
                info    = $( "#sortable" ).attr('data-info');
            $.post(MODULE_PATH+'/siteuserdashboard/controller/tradingeducation/imgswap.php',{imgorder:order,info:info,SourceForm:'changeSwap'},function(data, status){
                console.log('Status ok');
            });
        }
    });
    $('textarea').each(function () {
        var idInfo = $(this).attr('id');
        $('#' + idInfo).css({
            'width': '100%',
            'height': '350px'
        });
        if (typeof (idInfo) != "undefined") {
            $('#' + idInfo).htmlarea();
        }
    });
    $('.tdsortable').dragswap({

        element : 'tr',

        dropAnimation: false,

        dropComplete: function(){

            var order = $('.tdsortable').dragswap('toArray');

            $.ajax({

                url     : MODULE_PATH+'/'+PAGETYPE+'/controller/'+DTACTION+'/swap.php',

                type    : "POST",

                data    : {'SourceForm':'changeSwap', 'order':order},

                cache   : false,

                dataType: "json",

                success : function(data, textStatus, jqXHR)

                {

                    

                },

                error   : function (jqXHR, textStatus, errorThrown)

                {

                    

                }

            });

        } 

    });
    $('#site-page input[name="pageName"]').keyup(function(){

        $.ajax({

            url     : MODULE_PATH+'/pagemanagement/controller/sitepage/create_permalink.php',

            type    : "POST",

            data    : {'SourceForm':'createPermalink','input':$(this).val()},

            cache   : false,

            dataType: "json",

            success : function(data, textStatus, jqXHR)

            {

                $('#site-page input[name="permalink"]').val(data['permalink']);

            },

            error   : function (jqXHR, textStatus, errorThrown)

            {



            }

        });        

    });
    $('select[name="attrType"]').change(function(){

        if($(this).val()!='')

            $(this).parent().next('.opt-cntr').fadeIn();

        else

            $(this).parent().next('.opt-cntr').fadeOut();

    });
    $(document).on('click','.form-group .remove_attr',function(){

        $(this).parent().remove(); 

    });
    $(document).on('click','.form-group .add_attr',function(){

        $(this).parent().parent().append('<div class="separation"><input class="form-control" name="optName[]"><span class="remove_attr">Remove</span></div>'); 

    });
    $('.deletealert').click(function(e){

        e.preventDefault();

        $('.cnf_dlt').unwrap('<span>').remove();

        

        var href = $(this).attr('href');

        var msg = $(this).data('alartmsg');

        var html = '<div class="cnf_dlt"><p>'+msg+'</p><span class="yes">Yes</span><span class="no">No</span></div>';

        $(this).wrap('<span style="position:relative">').after(html);

        $(this).next('.cnf_dlt').find('span.yes').click(function(){

            window.location.href = href; 

        });

        $(this).next('.cnf_dlt').find('span.no').click(function(){

            //$(this).parents('.cnf_dlt').remove();

            $(this).parent('.cnf_dlt').unwrap('<span>').remove();

        });

    });
    $(document).on("click", "ul.nav li.parent > a > span.icon", function () {

        $(this).find('em:first').toggleClass("glyphicon-minus");

    });
    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    $('#admin_login_form').submit(function(e){

        var link = $(this);

        var submitLink = link.find('input[type="submit"]');

        var preVal = submitLink.val();

        submitLink.val('Wait...').attr('disabled','disabled');

        e.preventDefault(); 

        $.ajax({

            url     : MODULE_PATH+'/sitehome/controller/login/action.php',

            type    : "POST",

            data    : link.serialize(),

            cache   : false,

            dataType: "json",

            success : function(data, textStatus, jqXHR)

            {

                if(data[0]=='success'){

                    generateSuccessMessage(link.find('.show_msg'),data[1]);

                    window.location.href=SITE_LOC_PATH+'/admin/';

                }

                else

                    generateErrorMessage(link.find('.show_msg'),data[1]);

                

                submitLink.val(preVal).removeAttr('disabled');

            },

            error   : function (jqXHR, textStatus, errorThrown)

            {

                generateErrorMessage(link.find('.show_msg'),errorThrown);

                submitLink.val(preVal).removeAttr('disabled');

            }

        })

    });
    /*
    $(document).on('keyup click focus','input[name="siteuser"]',function(){
        var thisval = $(this).val();
        var srchrslt = $('#srch-rslt-usr');
        if(thisval.trim() !=='') {
            srchrslt.html('<li><a style="cursor:default" href="javascript:void(0);"><i class="fa fa-spinner fa-pulse fa-fw"></i> Wait. Searching for <strong class="text-info">"'+thisval+'"</strong></a></li>').parent('.dropdown').addClass('open');
            $.post(SITE_LOC_PATH+'/modules/siteuserdashboard/controller/deposite/action.php',
            {
                SourceForm: "getUserList",
                key: thisval,
                ajax: '1'
            },
            function(data, status){
                console.log("Data: " + data + "\nStatus: " + status);
                if(data.typ) {
                    var rsltstr='<li><a style="cursor:default" href="javascript:void(0);">SHOWING '+data.showno+' OUT OF '+data.recno+' FOR <strong class="text-info">"'+thisval+'"</strong></a></li>';
                    $.each(data.rec, function(index, item) {
                        var showStr = item.fname+' '+item.lname+' ('+item.email+') ';
                        var showStr = showStr.toLowerCase();
                        var matckkey = thisval.toLowerCase();
                        showStr = showStr.replace(matckkey , '<span style="color:#FF0000; font-weight:bold">$&</span>');
                        rsltstr += '<li><a onclick="putval('+item.usrId+')" href="javascript:void(0);">'+showStr+'</a></li>';
                    });
                    srchrslt.html(rsltstr);
                }
                else
                    srchrslt.html('<li><a style="cursor:default" href="javascript:void(0);">Sorry! No data found.</a></li>');
            },'json');
        }
        else
            srchrslt.html('').parent('.dropdown').removeClass('open');
    })
    */
    
    $(document).on('click','.open-tracking-details',function(){
        var link = $(this);
        var putcntr = $('#tracking-modal').find('.modal-body');
        var info = link.attr('data-info');
        var type = link.attr('data-type');
        $('#tracking-modal').modal('show');
        putcntr.attr('data-info',info);
        putcntr.attr('data-type',type);
    });
    $("#tracking-modal").on('shown.bs.modal', function(){
        var putcntr = $('#tracking-modal').find('.modal-body');
        var info = putcntr.attr('data-info');
        var type = putcntr.attr('data-type');
        putcntr.html('<div class="text-center"><img src="https://www.darkmatter.ae/media/1525/wait.gif"></div>');
        $.ajax({
            url     :MODULE_PATH+'/siteuserdashboard/controller/duplicateaccounts/action.php',
            type    : "POST",
            data    : {
                'info':info,
                'type':type,
                'ajax':1,
                'SourceForm':'traceRecords'
            },
            cache   : false,
            success(data) {
                putcntr.html(data);
            }
        });
    });
    $("#tracking-modal").on('hide.bs.modal', function(){
        var putcntr = $('#tracking-modal').find('.modal-body');
        putcntr.html('<p>Wait. Loading...</p>');
        putcntr.removeAttr('data-info');
        putcntr.removeAttr('data-type');
    });
}(window.jQuery);

$(window).on('resize', function () {
    if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
})

$(window).on('resize', function () {
    if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
})

function generateErrorMessage(selector,message){

    var prefixmsg = '<div class="alert bg-danger" role="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>';

    var suffixmsg = '<a href="javascript:void(0);" onclick="customRemove($(this).parent());" class="pull-right"><i class="fa fa-times" aria-hidden="true"></i></a></div>';

    var msghtml = prefixmsg+message+suffixmsg;

    selector.html(msghtml);

}

function generateSuccessMessage(selector,message){

    var prefixmsg = '<div class="alert bg-success" role="alert"><i class="fa fa-check" aria-hidden="true"></i>';

    var suffixmsg = '<a href="javascript:void(0);" onclick="customRemove($(this).parent());" class="pull-right"><i class="fa fa-times" aria-hidden="true"></i></a></div>';

    var msghtml = prefixmsg+message+suffixmsg;

    selector.html(msghtml);

}

function customRemove(selector){
    selector.remove();
}

function deleteRow(element){
    element.parents('.list-group-item').remove();
}

function putval(value) {
    $('input[name="siteuser"]').val(value);
    $('#srch-rslt-usr').html('').parent('.dropdown').removeClass('open');
}

function getBusinessData(el,el2,el3,el4,title,info,sd='',ed='',addall="ADD"){
    el.html('Calculating...');
    el2.html('Calculating...');
    el3.html('Calculating...');
    el4.html('Calculating...');
    $.post(SITE_LOC_PATH+'/modules/employeemanagement/controller/empbusiness/action.php',
    {
        SourceForm: "getUserBusiness",
        title: title,
        info: info,
        sd: sd,
        ed: ed,
        ajax: '1'
    },
    function(data, status){
        if(data.typ) {
            el.html(data.data.act);
            el2.html(data.data.amnt.usd+'USD (Rs. '+data.data.amnt.rs+'/-)');
            el3.html(data.data.wamnt.usd+'USD (Rs. '+data.data.wamnt.rs+'/-)');
            el4.html(data.data.tamnt.usd+'USD (Rs. '+data.data.tamnt.rs+'/-)');
            if(addall=='ADD') {
                $('#ta').text(parseInt($('#ta').text())+parseInt(data.data.act));
                $('#tdu').text(parseInt($('#tdu').text())+parseInt(data.data.amnt.usd));
                $('#tdr').text(parseInt($('#tdr').text())+parseInt(data.data.amnt.rs));
                $('#twu').text(parseInt($('#twu').text())+parseInt(data.data.wamnt.usd));
                $('#twr').text(parseInt($('#twr').text())+parseInt(data.data.wamnt.rs));
                $('#ttu').text(parseInt($('#ttu').text())+parseInt(data.data.tamnt.usd));
                $('#ttr').text(parseInt($('#ttr').text())+parseInt(data.data.tamnt.rs));
            }
            SRCARRTMP = SRCARRTMP.concat(data.data.source);
            showSourceOrder(SRCARRTMP);
        }
    },'json');
}

function convertToSlug(Text){
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}

function sinkAllTarget() {
    var act = 0;
    var amnt = 0;
    $('input[name="targetActivation[]"]').each(function() {
        act += Number($(this).val());
    });
    $('input[name="targetamount[]"]').each(function() {
        amnt += Number($(this).val());
    });
    $('input[name="amount"]').val(amnt);
    $('input[name="activationNo"]').val(act);
    $('.tgt-display').html('<small>ACT:</small> '+act+' | <small>AMNT:</small> '+amnt).show();
}

function compressArray(original) {
 
	var compressed = [];
	// make a copy of the input array
	var copy = original.slice(0);
 
	// first loop goes over every element
	for (var i = 0; i < original.length; i++) {
 
		var myCount = 0;	
		// loop over every element in the copy and see if it's the same
		for (var w = 0; w < copy.length; w++) {
			if (original[i] == copy[w]) {
				// increase amount of times duplicate is found
				myCount++;
				// sets item to undefined
				delete copy[w];
			}
		}
 
		if (myCount > 0) {
			var a = new Object();
			a.value = original[i];
			a.count = myCount;
			compressed.push(a);
		}
	}
 
	return compressed;
};

function showSourceOrder(ARRS){
    var newArray = compressArray(ARRS);
    newArray.sort(function (x, y) {
        return y.count - x.count;
    });
    $('#src-rslt').html('<li class="list-group-item">SOURCE<span class="pull-right">SALE NO</span></li>');
    $.each(newArray,function(k,v){
        $('#src-rslt').append('<li class="list-group-item">'+v.value+'<span class="pull-right">'+v.count+'</span></li>')
    });
}

function generateRandomCode(length,type) {
    var result      = '';
    var characters  = '';
    switch (type) {
        case 'num':
            characters       = '1234567890';
            break;
        case 'lower':
            characters       = 'abcdefghijklmnopqrstuvwxyz';
            break;
        case 'upper':
            characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        case 'alfanumeric':
            characters       = 'abcdefghijklmnopqrstuvwxyz1234567890!@#$%';
            break;
        default:
            characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            break;
    }

    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

function generateCodeAt(length,type,at) {
    $(at).val(generateRandomCode(length,type));
}
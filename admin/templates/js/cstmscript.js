var usersearch = null,
    evcatsearch = null,
    eventsearch = null;

$(function () {

    $(document).on('submit', '#form-charge', function (e) {
        e.preventDefault(0);
        const form = $(this);
        const submitBtn = form.find('[type="submit"]');
        const submitBtnVal = submitBtn.html();
        submitBtn.html('<div class="spinner-border text-primary"></div>').attr('disabled', 'disabled');
        const formArr = form.serialize();
        const browserData = getBrowserInfo();
        const browserDataQuery = new URLSearchParams(browserData).toString();

        $.ajax({
            type: "POST",
            url: MODULE_PATH + "/paymentmanagement/controller/chargeamount/action.php",
            data: formArr+'&'+browserDataQuery,
            catch: false,
            dataType: 'json',
            success: function (data) {
                submitBtn.html(submitBtnVal).removeAttr('disabled');
                const swaltyp = data.typ ? 'success' : 'error';
                swal(swaltyp, data.msg, swaltyp);
                if(typeof data.goto != 'undefined') {
                    location.href = data.goto;
                }
            },
            error: function (data) {
                alert('Network error');
            }
        });
    })

    $('#form-charge .usersearch').on('select2:select', function (e) {
        var data = e.params.data;

        const dropCntr = $('#form-charge .change-client-cntr');
        const token = $('#form-charge').attr('data-token');

        dropCntr.html('<div class="spinner-border text-primary"></div>');
        $.ajax({
            type: "POST",
            url: MODULE_PATH + "/paymentmanagement/controller/chargeamount/action.php",
            data: {
                SourceForm: 'getWalletAndCard',
                ajax: '1',
                client: data.id,
                csrfToken: token,
                ajax: 1
            },
            catch: false,
            dataType: 'json',
            success: function (data) {
                if (data.typ == 1)
                    dropCntr.html(data.html);
                else
                    alert(data.msg);
                if ($('#form-charge .select2-single').length) $('#form-charge .select2-single').select2();
            },
            error: function (data) {
                alert('Network error');
            }
        });
    });
    // $(document).on('change','#form-charge [name="clientId"]', function(){
    //     const thisVal = $(this).val();
    //     console.log(thisVal);
    // })

    if ($('.select2-single').length) $('.select2-single').select2();

    var today = new Date()
    var curHr = today.getHours()
    if (curHr < 6) {
        $('#welcome-text').text('Good night');
    } else if (curHr < 12) {
        $('#welcome-text').text('Good morning');
    } else if (curHr < 17) {
        $('#welcome-text').text('Good afternoon');
    } else if (curHr < 20) {
        $('#welcome-text').text('Good evening');
    } else {
        $('#welcome-text').text('Good night');
    }

    $('#calendar, #calendar2, #calendar3').datepicker({
        format: 'dd-mm-yyyy'
    });

    $('.timepicker').datetimepicker({
        format: 'HH:mm:ss'
    });

    $(document).on('submit', '#add-copy-event-form', function (e) {
        e.preventDefault();
        var link = $(this);
        var submitLink = link.find('[type="submit"]');
        var preVal = submitLink.html();
        const formData = link.serialize();
        submitLink.html('Processing...').attr('disabled', 'disabled');
        // console.log(formData);
        $.ajax({
            url: MODULE_PATH + '/eventmanagement/controller/eventlist/action.php',
            type: "POST",
            data: formData,
            cache: false,
            dataType: "json",
            success: function (data, textStatus, jqXHR) {
                if (data.typ == '1') {
                    generateSuccessMessage(link.find('.show_msg'), data.msg);
                }
                else
                    generateErrorMessage(link.find('.show_msg'), data.msg);
                submitLink.html(preVal).removeAttr('disabled');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                generateErrorMessage(link.find('.show_msg'), errorThrown);
                submitLink.html(preVal).removeAttr('disabled');
            }
        })
    })


    $(document).on('change', '#event-order [name="eventId"]', function () {
        console.log('qqq')
        var thisEl = $(this);
        var thisVal = thisEl.val();
        $('#event-order .event-info').html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');
        $.ajax({
            type: "POST",
            url: MODULE_PATH + "/eventmanagement/controller/eventlist/get-event-info-order.php",
            data: {
                SourceForm: 'getEventInfoForOrder',
                ajax: '1',
                event: thisVal,
                editid: thisEl.attr('data-editid')
            },
            catch: false,
            dataType: 'json',
            success: function (data) {
                if (data.typ == 1)
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

    $(document).on('click', '.crt-gtwy', function (e) {
        e.preventDefault(0);
        const thisBtn = $(this);
        const btnVal = thisBtn.html();
        thisBtn.attr('disabled', 'disabled').html('<span class="spinner-border spinner-border-sm"></span>');

        $.ajax({
            url: MODULE_PATH + '/siteusermanagement/controller/clientlist/action.php?r=' + Math.random(),
            type: "POST",
            data: {
                SourceForm: 'crtGtwy',
                csrfToken: thisBtn.attr('data-token'),
                type: thisBtn.attr('data-type'),
                id: thisBtn.attr('data-id'),
                ajax: 1
            },
            cache: false,
            dataType: "json",
            success: function (data, textStatus, jqXHR) {
                if (data.typ == '1') {
                    swal('Success', data.msg, 'success');
                    thisBtn.parent().html(data.gatewayId);
                }
                else {
                    swal('Error', data.msg, 'error');
                    thisBtn.html(btnVal).removeAttr('disabled');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                generateErrorMessage(link.find('.show_msg'), errorThrown);
                thisBtn.html(btnVal).removeAttr('disabled');
            }
        })
    })

    $(document).on('click', '.add-event-time', function () {
        $(this).parents('.rowindv').after(`
        <div class="row rowindv">
            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text">From</span>
                    <select class="form-select form-select-sm" '.$disabled18.' name="startTimeHour[]">
                        <option value="">HH</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                    <select class="form-select form-select-sm" '.$disabled18.' name="startTimeMinute[]">
                        <option value="">MM</option>
                        <option>00</option>
                        <option>15</option>
                        <option>30</option>
                        <option>45</option>
                    </select>
                    <select class="form-select form-select-sm" '.$disabled18.' name="startTimeAmpm[]">
                        <option>AM</option>
                        <option>PM</option>
                    </select>
                </div>
            </div>
            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text">To</span>
                    <select class="form-select form-select-sm" '.$disabled18.' name="endTimeHour[]">
                        <option value="">HH</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                    <select class="form-select form-select-sm" '.$disabled18.' name="endTimeMinute[]">
                        <option value="">MM</option>
                        <option>00</option>
                        <option>15</option>
                        <option>30</option>
                        <option>45</option>
                    </select>
                    <select class="form-select form-select-sm" '.$disabled18.' name="endTimeAmpm[]">
                        <option>AM</option>
                        <option>PM</option>
                    </select>
                </div>
            </div>
            <div class="col-2 text-right">
                <button type="button" class="btn btn-info btn-sm add-event-time">+</button>
                <button type="button" class="btn btn-danger btn-sm remove-event-time">X</button>
            </div>
        </div>
        `);
        $('.timepicker').datetimepicker({
            format: 'HH:mm:ss'
        });
    })

    $(document).on('click', '.remove-event-docbring', function () {
        $(this).parents('.rowindv').remove();
    })

    $(document).on('click', '.add-event-docbring', function () {
        $(this).parents('.rowindv').after(`
        <div class="row rowindv">
            <div class="col-10">
                <input class="form-control" type="text" name="participantBrings[]" placeholder="What to bring">
            </div>
            <div class="col-2 text-right">
                <button type="button" class="btn btn-info btn-sm add-event-docbring">+</button>
                <button type="button" class="btn btn-danger btn-sm remove-event-docbring">X</button>
            </div>
        </div>
        `);
    })

    $(document).on('click', '.remove-event-price', function () {
        $(this).parents('.rowindv').remove();
    })

    $(document).on('click', '.add-event-price', function () {
        var rowPrcNo = $('.repeat-event-price-row').children().length;
        if (rowPrcNo <= 4) {
            $(this).parents('.rowindv').after(`
            <div class="row rowindv prcevntcntr">
                <div class="col">
                    <input class="form-control" type="text" name="priceText[]" placeholder="Price Text">
                </div>
                <div class="col">
                    <input class="form-control" type="number" name="printedPrice[]" placeholder="Printed Price">
                </div>
                <div class="col">
                    <input class="form-control" type="number" name="sellingPrice[]" placeholder="Selling Price">
                </div>
                <div class="col">
                    <span>0</span>% OFF
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-info btn-sm add-event-price">+</button>
                    <button type="button" class="btn btn-danger btn-sm remove-event-price">X</button>
                </div>
            </div>
            `);
        }
        else
            alert('Maximum 5');
    })

    $(document).on('keyup change', '.prcevntcntr input[name="printedPrice[]"], .prcevntcntr input[name="sellingPrice[]"]', function () {

        const thisEl = $(this).parents('.prcevntcntr');
        const printedPrice = thisEl.find('input[name="printedPrice[]"]').val();
        const sellingPrice = thisEl.find('input[name="sellingPrice[]"]').val();
        const discount = (!isNaN(printedPrice) && !isNaN(sellingPrice)) ? ((printedPrice - sellingPrice) / printedPrice * 100).toFixed(2) : 0;
        thisEl.find('span').text(discount);
    })

    $(document).on('click', '.remove-event-time', function () {
        $(this).parents('.rowindv').remove();
    })

    $(document).on('change', 'input[name="profileType"]', function () {
        var val = $('input[name=profileType]:checked').val();
        $('.panel-profile').removeClass('open disabled').addClass('open').find('input, select, textarea').removeAttr('disabled');
        $('.panel-profile.pp-' + val).addClass('disabled').find('input, select, textarea').attr('disabled', 'disabled');
    })

    $(document).on('change', 'input[name="txnType"]', function () {
        var val = $('input[name=txnType]:checked').val();
        $('.panel-bankmethod').removeClass('open disabled').addClass('open').find('input, select, textarea').removeAttr('disabled');
        $('.panel-bankmethod.pp-' + val).addClass('disabled').find('input, select, textarea').attr('disabled', 'disabled');
    })

    $(document).on('change', 'input[name="isRecurring"]', function () {
        var val = $('input[name=isRecurring]:checked').val();
        $('.panel-recurring-event').removeClass('open disabled').addClass('open').find('input, select, textarea').removeAttr('disabled');
        $('.panel-recurring-event.re-' + val).addClass('disabled').find('input, select, textarea').attr('disabled', 'disabled');
    })

    $(document).on('change', 'input[name="eventAddressType"]', function () {
        var val = $('input[name=eventAddressType]:checked').val();
        $('.panel-address-event').removeClass('open disabled').addClass('open').find('input, select, textarea').removeAttr('disabled');
        $('.panel-address-event.re-' + val).addClass('disabled').find('input, select, textarea').attr('disabled', 'disabled');
    })

    $(document).on('change', 'input[name="eventPriceType"]', function () {
        var val = $('input[name=eventPriceType]:checked').val();
        $('.panel-price-event').removeClass('open disabled').addClass('open').find('input, select, textarea').removeAttr('disabled');
        $('.panel-price-event.re-' + val).addClass('disabled').find('input, select, textarea').attr('disabled', 'disabled');
    })


    $(document).on('change', 'input[name="profileType"]', function () {
        var val = $('input[name=profileType]:checked').val();
        $('.panel-profile').removeClass('open disabled').addClass('open').find('input, select, textarea').removeAttr('disabled');
        $('.panel-profile.pp-' + val).addClass('disabled').find('input, select, textarea').attr('disabled', 'disabled');
    })

    usersearch = $('.usersearch').select2({
        allowClear: true,
        placeholder: 'Client ID / Name / Email ?',
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

    evcatsearch = $('.evcatsearch').select2({
        allowClear: true,
        placeholder: 'Event Category ?',
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
                    results: response
                };
            },
            cache: true
        }
    });

    eventsearch = $('.eventsearch').select2({
        allowClear: true,
        placeholder: 'Event ?',
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

    $("#sortable").sortable({
        update: function (event, ui) {
            var sortedIDs = $("#sortable").sortable("toArray");
            var initpos = ui.item.data('initpos');
            $.ajax({
                url: MODULE_PATH + '/' + PAGETYPE + '/controller/' + DTACTION + '/swap.php',
                type: "POST",
                data: { SourceForm: 'changeSwap', order: sortedIDs, initpos: initpos },
                cache: false,
                dataType: "json",
                success: function (data, textStatus, jqXHR) {

                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        }
    });

    $('#admin_login_form').submit(function (e) {
        var link = $(this);
        var submitLink = link.find('[type="submit"]');
        var preVal = submitLink.html();
        submitLink.html('Wait...').attr('disabled', 'disabled');
        e.preventDefault();
        $.ajax({
            url: MODULE_PATH + '/sitehome/controller/login/action.php',
            type: "POST",
            data: link.serialize(),
            cache: false,
            dataType: "json",
            success: function (data, textStatus, jqXHR) {
                if (data[0] == 'success') {
                    generateSuccessMessage(link.find('.show_msg'), data[1]);
                    window.location.href = data[2];
                }
                else
                    generateErrorMessage(link.find('.show_msg'), data[1]);
                submitLink.html(preVal).removeAttr('disabled');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                generateErrorMessage(link.find('.show_msg'), errorThrown);
                submitLink.html(preVal).removeAttr('disabled');
            }
        })
    });

    $('.confirmalert').click(function (e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var title = $(this).data('title');
        var msg = $(this).data('msg');
        swal({
            title: title,
            text: msg,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = href;
            }
        });

    });
})

function generateErrorMessage(selector, message) {
    var prefixmsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert"></button><strong>Danger!&nbsp;</strong>';
    var suffixmsg = '</div>';
    var msghtml = prefixmsg + message + suffixmsg;
    selector.html(msghtml);
}

function generateSuccessMessage(selector, message) {
    var prefixmsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert"></button><strong>Success!</strong>&nbsp;';
    var suffixmsg = '</div>';
    var msghtml = prefixmsg + message + suffixmsg;
    selector.html(msghtml);
}

function autoSearchTmpl(repo) {
    // console.log(repo)
    if (repo.loading) {
        return repo.text;
    }

    var subHeading = (typeof repo.subHeading != 'undefined') ? repo.subHeading : '';
    var $container = $(
        `
        <div class="d-flex justify-content-start">
            <div class="">
                <img width="50" src="` + repo.image + `" />
            </div>
            <div class="ms-2">
                <h4 class="m-0">`+ repo.heading + `&nbsp;` + repo.deletedHtml + `</h4>
                `+ subHeading + `
                <p class="m-0">`+ repo.description + `</p>
            </div>
        </div>
        `
    );

    return $container;
}

function generateRandomCode(length, type) {
    var result = '';
    var characters = '';
    switch (type) {
        case 'num':
            characters = '1234567890';
            break;
        case 'lower':
            characters = 'abcdefghijklmnopqrstuvwxyz';
            break;
        case 'upper':
            characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        case 'alfanumeric':
            characters = 'abcdefghijklmnopqrstuvwxyz1234567890!@#$%';
            break;
        default:
            characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            break;
    }

    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

function generateCodeAt(length, type, at) {
    $(at).val(generateRandomCode(length, type));
}

function getBrowserInfo() {
    // Get the values using the navigator object
    const acceptHeader = navigator.userAgent;
    const javaEnabled = navigator.javaEnabled();
    const language = navigator.language;
    const colorDepth = window.screen.colorDepth;
    const screenHeight = window.screen.height;
    const screenWidth = window.screen.width;
    const timeZoneOffset = new Date().getTimezoneOffset();
    const userAgent = navigator.userAgent;
    const javascriptEnabled = true; // This value is always true in JavaScript

    // Store the values in an object
    const browserInfo = {
        "AcceptHeader": acceptHeader,
        "JavaEnabled": javaEnabled,
        "Language": language,
        "ColorDepth": colorDepth,
        "ScreenHeight": screenHeight,
        "ScreenWidth": screenWidth,
        "TimeZoneOffset": timeZoneOffset,
        "UserAgent": userAgent,
        "JavascriptEnabled": javascriptEnabled
    };

    // Output the object
    return browserInfo;
}
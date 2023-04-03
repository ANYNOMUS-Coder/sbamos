<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

echo '
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"><!--<a href="'.$SITE_LOC_PATH.'/admin/">'.SITE_NAME.'</a>--> '.SITE_EMAIL.'</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">'.COPYRIGHT.'</span>
    </div>
</footer>
<div class="modal fade" id="file-uploads-explorer" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">File Manager</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="flexplrtab nav-link " id="fl-list-tab" data-bs-toggle="tab" data-bs-target="#fl-list" type="button" role="tab" aria-controls="fl-list" aria-selected="true">Gallery</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="flexplrtab nav-link fla active" id="fl-upload-tab" data-bs-toggle="tab" data-bs-target="#fl-upload" type="button" role="tab" aria-controls="fl-upload" aria-selected="false">Upload</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade " id="fl-list" role="tabpanel" aria-labelledby="fl-list-tab">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="fl-type" id="fl-type"></div>
                            </div>
                            <div class="col-md-9">
                                <div class="fl-cntr-list" id="modal-body"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="fl-upload" role="tabpanel" aria-labelledby="fl-upload-tab">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                <div class="fl-select-cntr"></div>
            </div>
        </div>
    </div>
</div>
';

echo ($eventId) ? '
<div class="modal" id="add-copy-event-db">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="" method="post" id="add-copy-event-form">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Duplicate</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3 mt-3">
                        <label class="form-label">Enter How many copies you want to make ?</label>
                        <input type="number" class="form-control" placeholder="Enter Number" name="copyNo">
                    </div>
                    <div class="show_msg"></div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="hidden" name="csrfToken" value="'.formToken('addCopyEventForm', $CSRF_TOKEN).'"/>
                    <input type="hidden" name="event" value="'.$eventId.'" />
                    <input type="hidden" name="ajax" value="1" />
                    <input type="hidden" name="SourceForm" value="addCopyEventForm">
                    <button type="submit" class="btn btn-primary">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>
' : '';
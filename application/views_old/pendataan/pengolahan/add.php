<div class="panel">
    <div class="panel-body">
        <section class="content">
            <form class="form-horizontal" id="form_add" data-toggle="validator"  name="form_add" method="post" action="">
                <div id="smartwizard">
                    <ul>
                        <li><a href="#step-1">Data 1<br /><small>Identitas</small></a></li>
                        <li><a href="#step-2">Data 2<br /><small>Keterangan Umum</small></a></li>
                        <li><a href="#step-10">Data 3<br /><small>Jumlah Peralatan Produksi</small></a></li>
                        <li><a href="#step-5">Data 4<br /><small>Bahan Baku Utama</small></a></li>
                        <li><a href="#step-6">Data 5<br /><small>Bahan Lainnya</small></a></li>
                        <li><a href="#step-7">Data 6<br /><small>Nilai Produksi</small></a></li>
                        <li><a href="#step-3">Data 6 <br/><small>Sertifikat & Perijinan</small></a></li>

                    </ul>
                    <div>

                        <div id="step-1" class="">
                            <?php $this->load->view('pendataan/pengolahan/step/step_1'); ?>
                        </div>
                        <div id="step-2" class="">
                            <?php $this->load->view('pendataan/pengolahan/step/step_2'); ?>
                        </div>
                        <div id="step-5" class="">
                            <?php $this->load->view('pendataan/pengolahan/step/step_5'); ?>
                        </div>
                        <div id="step-6" class="">
                            <?php $this->load->view('pendataan/pengolahan/step/step_6'); ?>
                        </div>
                        <div id="step-7" class="">
                            <?php $this->load->view('pendataan/pengolahan/step/step_7'); ?>
                        </div>
                        <div id="step-10" class="">
                            <?php $this->load->view('pendataan/pengolahan/step/step_10'); ?>
                        </div>
                        <div id="step-3" class="">
                            <?php $this->load->view('pendataan/pengolahan/step/step_3'); ?>
                        </div>

                    </div>
                </div>
            </form>

        </section>
        <br><br>
    </div>
</div>

    

    <script type="text/javascript">
$(document).ready(function(){
    $('#jenis_perijinan').select2();
    
    // Toolbar extra buttons
    var btnFinish = $('<button></button>').text('Finish')
                                    .addClass('btn btn-info')
                                    .on('click', function(){
                                            if( !$(this).hasClass('disabled')){
                                                var elmForm = $("#form_add");
                                                if(elmForm){
                                                    elmForm.validator('validate');
                                                    var elmErr = elmForm.find('.has-error');
                                                    if(elmErr && elmErr.length > 0){
                                                        swal({
                                                            title: 'Gagal!',
                                                            text: 'Terjadi kesalahan penginputan data',
                                                            type: 'warning'
                                                        });
                                                        return false;
                                                    }else{
                                                        // alert('Great! we are ready to submit form');
                                                        elmForm.submit();
                                                        return false;
                                                    }
                                                }
                                            }
                                        });

    $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'arrows',
                transitionEffect:'fade',
                toolbarSettings: {toolbarPosition: 'bottom',
                                toolbarExtraButtons: [btnFinish]
                                },
                anchorSettings: {
                            markDoneStep: true, // add done css
                            markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                            removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                            enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                        }
            });

        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
            if(stepDirection === 'forward' && elmForm){
                elmForm.validator('validate');
                var elmErr = elmForm.children('.has-error');
                if(elmErr && elmErr.length > 0){
                    // Form validation failed
                    return false;
                }
            }
            return true;
        });

        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            if(stepNumber == 3){
                $('.btn-finish').removeClass('disabled');
            }else{
                $('.btn-finish').addClass('disabled');
            }
        });

    });


    </script>
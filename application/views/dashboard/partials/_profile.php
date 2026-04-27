        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Data Diri </h5>
                <div class="ibox-tools">
                   <a href="<?=site_url('users/user_informations/edit/').$this->session->userdata['id']?>">
                        <i class="fa"><strong> Ubah </strong> </i>
                   </a>
                </div>
            </div>
            <div class="ibox-content" style="">
                <div class="row m-b-lg m-t-lg">
                    <div class="col-md-6">

                        <div class="profile-image">
                            <img src="<?= assets_url('images/'.$basic_informations->caption)?>" class="img-circle circle-border m-b-md" alt="profile">
                        </div>
                        <div class="profile-info">
                            <div class="">
                                <div>
                                    <h2 class="no-margins">
                                        <?=$basic_informations->full_name;?>
                                    </h2>
                                    <h4><?=$basic_informations->email;?></h4>
                                    <small>
                                        No Telp : <?=$basic_informations->contact_person;?><br>
                                        Website : <?=$basic_informations->website;?><br>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <table class="table small m-b-xs">
                            <tbody>
                            <tr>
                                <td>
                                    <?=$basic_informations->address_line_1;?>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <?=$basic_informations->address_line_2;?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?=$basic_informations->address_line_3;?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
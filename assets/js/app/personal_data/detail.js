
                            $(window).on('load',function () {
                               
                                $('#bidang_usaha').select2({
                                    dropdownParent: $("#myModalAdd")
                                });
                                $('#jenis_pendataan').select2({
                                    dropdownParent: $("#myModalAdd")
                                });
                            });

                            function url(url) {
                                document.getElementById("form_add").action = site_url + "pendataan/"+$('#jenis_pendataan').val()+"/add/";
                              } 



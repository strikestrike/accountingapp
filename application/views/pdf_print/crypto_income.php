<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
</head>

<body>
    <table style="width:90%; margin: 0 auto;">
        <tr>
            <td>
                <table style="width:100%; border-bottom: 1px solid #EEEEEE;">
                    <tr>
                        <td style=" width: 33%; ">
                            <p style="color:#7e7e7e; font-family: 'poppins', sans-serif; ">Retrieving information from 2021 ″Project name″</p>
                        </td>
                        <td style=" width: 33%; ">
                            <p style="color:#7e7e7e; font-family: 'poppins', sans-serif; text-align: center !important; ">Load document</p>
                            
                        </td>
                        
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td>
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: center !important; color: #3d4465;">I don't have the old form, please add your personal datae</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 20%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Salutation</p>
                        </td>
                        <td style=" width: 25%; ">
                            <div>
                                <label class="radio-inline me-3"><input type="radio" value="<?= $crypto_data->salutation; ?>" name="optradio"> Mr</label>
                                <label class="radio-inline me-3"><input type="radio" value="<?= $crypto_data->salutation; ?>" name="optradio"> Mrs</label>
                            </div>
                        </td>
                        <td style=" width: 25%; "></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 20%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Name Surname</p>
                        </td>
                        <td style=" width: 25%; "><input type="text" class="form-control" value="<?= $crypto_data->name_surname; ?>" placeholder="Aasasasa" style="    background: #fafafa;   border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:80%;"></td>
                       
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Personal number</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $crypto_data->per_number; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 20%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Address</p>
                        </td>
                        <td style=" width: 25%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">Country</label><br>
                            <input type="text" class="form-control" value="<?= $crypto_data->country; ?>" placeholder="Aasasasa" style="background: #fafafa;

    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:80%;">
                        </td>
                        <td style=" width: 25%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">City</label><br>
                            <input type="text" class="form-control" value="<?= $crypto_data->city; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:80%;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Address</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $crypto_data->address; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <div style="background-color: #eeee; height: 2px; width: 100%;     margin-top: 20px;  margin-bottom: 20px;">
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td style=" width: 29%; ">
                                <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000;">Information "Product name" 2021</p>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Income</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $crypto_data->income1; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Taxable income</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $crypto_data->taxable_income; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Tax</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $crypto_data->tax; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Total income for health</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $crypto_data->total_income_for_health; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Health insurance tax</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $crypto_data->health_insurance_tax; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 20%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">To be paid</p>
                        </td>
                        <td style=" width: 25%; "><input type="text" class="form-control" value="<?= $crypto_data->to_be_paid; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:80%;"></td>
                        <td style=" width: 25%; "><input type="text" class="form-control" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:80%;"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Redirect 3.5% to one ONG</p>
                        </td>
                        <td style=" width: 80%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">Choose from list</label><br>
                            <input type="text" class="form-control" value="<?= $crypto_data->choose_from_list; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;">
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;"></p>
                        </td>
                        <td style=" width: 80%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">OMG Name</label><br>
                            <input type="text" class="form-control" value="<?= $crypto_data->omg_name; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;">
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;"></p>
                        </td>
                        <td style=" width: 80%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">Registration No.</label><br>
                            <input type="text" class="form-control" value="<?= $crypto_data->registration_no; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;">
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;"></p>
                        </td>
                        <td style=" width: 80%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">Bank Account</label><br>
                            <input type="text" class="form-control" value="<?= $crypto_data->bank_account; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;">
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td style=" width: 29%; ">
                                <div style="background-color: #eeee; height: 2px; width: 100%;     margin-top: 20px; margin-bottom: 10px;"></div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td style=" width: 29%; ">
                                <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000;">Informations "Product name" 2022</p>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Do you need health insurance ?</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $crypto_data->do_you_need_health_insurance; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Income</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $crypto_data->income2; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Health insurance tax</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $crypto_data->health_insurance_tax2; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #EE3232;">To be paid till 2023</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $crypto_data->to_be_paid_till_2023; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

                    </tr>
                </table>
            </td>
        </tr>

        <tr>
         
        </tr>
        <tr>
        </tr>
      
    </table>





</body>

</html>
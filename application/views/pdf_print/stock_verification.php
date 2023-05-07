<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
</head>

<body>
    <table style="width:90%; margin: 0 auto;">


        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 20%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Salutation</p>
                        </td>
                        <td style=" width: 25%; ">
                            <div>
                                <label class="radio-inline me-3"><input type="radio" value="<?= $stock_verification->salutation; ?>" name="optradio"> Mr</label>
                                <label class="radio-inline me-3"><input type="radio" value="<?= $stock_verification->salutation; ?>" name="optradio"> Mrs</label>
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
                        <td style=" width: 25%; "><input type="text" class="form-control" value="<?= $stock_verification->name_surname; ?>" placeholder="Aasasasa" style="    background: #fafafa;   border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:80%;"></td>
                        <td style=" width: 25%; "><input type="text" class="form-control" placeholder="Aasasasa" style="background: #fff;
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
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Personal number</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $stock_verification->per_number; ?>" placeholder="Aasasasa" style="background: #fafafa;
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
                        <td style=" width: 25%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">
                                Country</label><br><input type="text" class="form-control" value="<?= $stock_verification->country; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:80%;"></td>
                        <td style=" width: 25%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">

                                City</label><br><input type="text" class="form-control" value="<?= $stock_verification->city; ?>" placeholder="Aasasasa" style="background: #fafafa;
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
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Address</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $stock_verification->address; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

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
                                <div style="background-color: #eeee; height: 2px; width: 100%;     margin-top: 20px;  margin-bottom: 20px;"></div>
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
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;"></p>
                        </td>
                        <td style=" width: 25%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">Countries list</label><br><input type="text" class="form-control" value="<?= $stock_verification->countries_list; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:70%;"></td>
                        <td style=" width: 25%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">Dividents</label><br><input type="text" class="form-control" value="<?= $stock_verification->dividents; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:70%;"></td>
                        <td style=" width: 25%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">Tax</label><br><input type="text" class="form-control" value="<?= $stock_verification->tax1; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:70%;"></td>

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
                        <td style=" width: 25%; "><input type="text" class="form-control" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:70%;"></td>
                        <td style=" width: 25%; "><input type="text" class="form-control" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:70%;"></td>
                        <td style=" width: 25%; "><input type="text" class="form-control" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:70%;"></td>

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
                        <td style=" width: 25%; "><input type="text" class="form-control" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:70%;"></td>
                        <td style=" width: 25%; "><input type="text" class="form-control" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:70%;"></td>
                        <td style=" width: 25%; "><input type="text" class="form-control" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:70%;"></td>

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
                        <td style=" width: 25%; "><input type="text" class="form-control" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:70%;"></td>
                        <td style=" width: 25%; "><input type="text" class="form-control" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:70%;"></td>
                        <td style=" width: 25%; "><input type="text" class="form-control" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:70%;"></td>

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
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $stock_verification->income; ?>" placeholder="Aasasasa" style="background: #fafafa;
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
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $stock_verification->taxable_income; ?>" placeholder="Aasasasa" style="background: #fafafa;
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
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $stock_verification->tax2; ?>" placeholder="Aasasasa" style="background: #fafafa;
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
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $stock_verification->total_income_for_health; ?>" placeholder="Aasasasa" style="background: #fafafa;
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
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $stock_verification->health_insurance_tax1; ?>" placeholder="Aasasasa" style="background: #fafafa;
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
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #EE3232;">To be paid until May 2022</p>
                        </td>
                        <td style=" width: 25%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;"></label><br><input type="text" class="form-control" value="<?= $rent_income->to_be_paid_till_2022; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:80%;"></td>
                      
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
                                <div style="background-color: #eeee; height: 2px; width: 100%;     margin-top: 20px;  margin-bottom: 20px;"></div>
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
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $stock_verification->do_you_need_health_insurance; ?>" placeholder="Aasasasa" style="background: #fafafa;
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
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Total Income</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $stock_verification->total_income; ?>" placeholder="Aasasasa" style="background: #fafafa;
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
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $stock_verification->health_insurance_tax2; ?>" placeholder="Aasasasa" style="background: #fafafa;
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
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #EE3232;">To be paid unit may 2023</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $stock_verification->to_be_paid_unit_2023; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 33px; border-radius: 0.5rem; width:90%;"></td>

                    </tr>
                </table>
            </td>
        </tr>


        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; "><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar"> <img src="save-btn.jpg" alt=""></a></td>
                        <td style=" width: 80%; "></td>

                    </tr>
                </table>
            </td>
        </tr>
    </table>





</body>

</html>
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
                            <p style="color:#7e7e7e; font-family: 'poppins', sans-serif; "></p>
                        </td>
                        <td style=" width: 33%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: center !important; color: #3d4465;">I don't have the old form, please add your personal data</p>
                        </td>
                        <td style=" width: 33%; "><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar"> <img src="update-information.png" alt=""></a></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td>
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: center !important; color: #3d4465;"></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                <table style="width:100%;"> hotel_regim_income
                    <tr>
                        <td style=" width: 20%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000;">Rented Space address</p>
                        </td>
                        <td style=" width: 50%; "><input type="text" class="form-control" value="<?= $hotel_regim_income->rented_space_address; ?>" placeholder="Aasasasa" style="    background: #fafafa;   border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:80%;"></td>

                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 22%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000;">National Id Data</p>
                        </td>

                        <td style=" width: 18%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">Rent value</label><input type="text" class="form-control" value="<?= $hotel_regim_income->rent_value; ?>" placeholder="Aasasasa" style="background: #fafafa; border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:80%;"></td>

                        <td style=" width: 18%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">Currency</label><input type="text" class="form-control" value="<?= $hotel_regim_income->currency; ?>" placeholder="Aasasasa" style="    background: #fafafa; border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:80%;"></td>
                        <td style=" width: 18%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">Year</label><input type="text" class="form-control" value="<?= $hotel_regim_income->year; ?>" placeholder="Aasasasa" style="   background: #fafafa; border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:80%;"></td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 22%; ">  
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000;">Financial Info</p>
                        </td>

                        <td style=" width: 18%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">Expenses</label><input type="text" class="form-control" value="<?= $hotel_regim_income->expenses; ?>" placeholder="Aasasasa" style="background: #fafafa; border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:80%;"></td>
                        <td style=" width: 18%; "><label style="font-weight: 500; line-height: 2.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #000; font-size: 14px;">Financial Loss</label><input type="text" class="form-control" value="<?= $hotel_regim_income->financial_loss; ?>" placeholder="Aasasasa" style="    background: #fafafa; border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:80%;"></td>
                        <td style=" width: 18%; "></td>

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
                        <td style=" width: 29%; "><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar"> <img src="save-btn2.png" alt=""></a></td>
                        <td style=" width: 80%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Add a new rented space</p>
                        </td>

                    </tr>
                    <tr>
                        <td style=" width: 29%; "><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar"> <img src="add-btn2.png" alt=""></a></td>
                        <td style=" width: 80%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Required fields</p>
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
    </table>





</body>

</html>
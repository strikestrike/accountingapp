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
                                <label class="radio-inline me-3"><input type="radio" value="<?= $hotel_rental->salutation; ?>" name="optradio"> Mr</label>
                                <label class="radio-inline me-3"><input type="radio" value="<?= $hotel_rental->salutation; ?>" name="optradio"> Mrs</label>
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
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Name Surname</p>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $hotel_rental->name_surname; ?>" placeholder="Aasasasa" style="background: #fafafa;
                            border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:90%; vertical-align: middle;"></td>
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
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $hotel_rental->per_number; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:90%; vertical-align: middle;"></td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Mobile number</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $hotel_rental->mob_number; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:90%; vertical-align: middle;"></td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 20%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">National Id Data</p>
                        </td>
                        <td style=" width: 25%; "><input type="text" class="form-control" value="<?= $hotel_rental->nationalid; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:80%; vertical-align: middle;"></td>
                        <td style=" width: 25%; "><input type="text" class="form-control" value="<?= $hotel_rental->nationalid2; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:80%; vertical-align: middle;"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%;">
                    <tr>
                        <td style=" width: 29%; ">
                            <p style="font-weight: 500; line-height: 1.2; font-family: 'poppins', sans-serif; text-align: left !important; color: #7e7e7e;">Birthday</p>
                        </td>
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $hotel_rental->birthday; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:90%; vertical-align: middle;"></td>
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
                        <td style=" width: 25%; "><input type="text" class="form-control" value="<?= $hotel_rental->address; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:80%; vertical-align: middle;"></td>
                        <td style=" width: 25%; "><input type="text" class="form-control" value="<?= $hotel_rental->address2; ?>" placeholder="Aasasasa" style="background: #fafafa;
    border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:80%; vertical-align: middle;"></td>
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
                        <td style=" width: 80%; "><input type="text" class="form-control" value="<?= $hotel_rental->address3; ?>" placeholder="Aasasasa" style="background: #fafafa;
        border: 0.0625rem solid #EEEEEE; padding: 0.3125rem 1.25rem; color: #6e6e6e; height: 45px; border-radius: 0.5rem; width:90%; vertical-align: middle;"></td>

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

    </table>





</body>

</html>
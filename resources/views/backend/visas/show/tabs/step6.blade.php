<table class="table table-striped table-hover">
    <tr>
        <th colspan="2" style="text-align: center"> <h3>Please upload a scanned copy of your original passport on this page. Please do not upload your digital picture on this page which you uploaded on the last page</h3></th>
    </tr>
    <tr>
        <th>Passport Photo</th>
        <td>
            @if($visa->p5_passport_photo_name == 'pdf')
                <a target="_blank" href="{{ Storage::disk('public')->url('img/visapassport/' . $visa->p5_passport_photo_name) }}">Download Passport in PDF</a>
            @else
            <img height="220" width="220" id="profileimg" src="{{ Storage::disk('public')->url('img/visapassport/' . $visa->p5_passport_photo_name) }}">
            @endif
            </td>
    </tr>
    @if($visa->p1_visa_type == 'e-Business Visa' )
        <tr>
            <th>Business Photo</th>
            <td>
                @if($visa->p5_business_photo_name == 'pdf')
                    <a href="{{ Storage::disk('public')->url('img/visabusiness/' . $visa->p5_business_photo_name) }}">Download Business Doc PDF</a>
                @else
                <img height="220" width="220" id="businessimg" src="{{ Storage::disk('public')->url('img/visabusiness/' . $visa->p5_business_photo_name) }}">
                @endif
                </td>
        </tr>
    @endif

    @if($visa->p1_visa_type == 'e-Medical Visa' )
        <tr>
            <th>Medical Photo</th>
            <td>
                @if($visa->p5_medical_photo_name == 'pdf')
                    <a href="{{ Storage::disk('public')->url('img/visamedical/' . $visa->p5_medical_photo_name) }}">Download Medical Doc PDF</a>
                @else
                    <img height="220" width="220" id="medicalimg" src="{{ Storage::disk('public')->url('img/visamedical/' . $visa->p5_medical_photo_name) }}">
                @endif
                </td>
        </tr>
    @endif
</table>
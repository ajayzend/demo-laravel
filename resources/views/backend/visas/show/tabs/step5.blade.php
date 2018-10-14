<table class="table table-striped table-hover">
    <tr>
        <th colspan="2" style="text-align: center"> <h3>Please upload a scanned copy of your original passport on this page. Please do not upload your digital picture on this page which you uploaded on the last page</h3></th>
    </tr>
    <tr>
        <th>Passport Photo</th>
        <td><img height="220" width="220" id="profileimg" src="{{ Storage::disk('public')->url('img/visapassport/' . $visa->p5_passport_photo_name) }}"></td>
    </tr>

</table>
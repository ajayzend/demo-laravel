<table class="table table-striped table-hover">
    <tr>
        <th colspan="2" style="text-align: center"> <h3>Additional Question Details</h3></th>
    </tr>
    <tr>
        <th>Have you ever been arrested/ prosecuted/ convicted by Court of Law of any country?</th>
        <td>{{ ($visa->p51_question1 == 'No') ? 'No' : 'Yes'  }}</td>
    </tr>

    <tr>
        <th>Have you ever been refused entry / deported by any country including India?</th>
        <td>{{ ($visa->p51_question2 == 'No') ? 'No' : 'Yes'  }}</td>
    </tr>

    <tr>
        <th>Have you ever been engaged in Human trafficking/ Drug trafficking/ Child abuse/ Crime against women/ Economic offense / Financial fraud?</th>
        <td>{{ ($visa->p51_question3 == 'No') ? 'No' : 'Yes'  }}</td>
    </tr>

    <tr>
        <th>Have you ever been engaged in Cyber crime/ Terrorist activities/ Sabotage/ Espionage/ Genocide/ Political killing/ other act of violence?</th>
        <td>{{ ($visa->p51_question4 == 'No') ? 'No' : 'Yes'  }}</td>
    </tr>


    <tr>
        <th>Have you ever by any means or medium, expressed views that justify or glorify terrorist violence or that may encourage others to terrorist acts or other serious criminal acts?</th>
        <td>{{ ($visa->p51_question5 == 'No') ? 'No' : 'Yes'  }}</td>
    </tr>

    <tr>
        <th>Have you sought asylum (political or otherwise)in any country?</th>
        <td>{{ ($visa->p51_question6 == 'No') ? 'No' : 'Yes'  }}</td>
    </tr>
</table>
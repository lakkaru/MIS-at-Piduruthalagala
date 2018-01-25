<div id="pagesBackgorund" class="well" style="border: none">
    <div id ="rosterTable" style="width: 80%; float: center">
        <table id="table"  style="width: 95%; border:3px solid black; border-spacing:0; margin: 10mm 10mm 5mm 25mm ;" > 
            <caption style="text-align: center; color: black"><p><b>Duty Roster of TOO-Piduruthalagala</p>
                <p>For The Month of 
                    <input type="text" id="cleander" class="input-sm" readonly name="cleander" style="width: 120px;"required/></b></p>
                <input type="text" id="rosterMonth"  hidden name="rosterMonth"/>
                <input type="button" class="noPrint btn btn-primary" id="print"  value="Print Roster"/>
            </caption>
            <tr id="tableHead">
                <th colspan="3" >Date</th><th colspan="2">1900 - 0300</th><th colspan="2" >0300 - 1100</th><th colspan="2">1100 - 1900</th>
            </tr>
        </table>
    </div>
    <div class="print center">
        <table id='names' >
            <tbody>
                <?php
                if (count($this->userList) >= 7) {//checking all user code availability with ADE
                    echo '<tr><td style="border: none" >'. $this->userList[0]['code'] . ' - </td><td style="border: none; text-align:left;"> &nbsp' . $this->userList[0]['name'] . '</td><td style="border: none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style="border: none">' . $this->userList[3]['code'] . ' - </td><td style="border: none; text-align:left;">&nbsp' . $this->userList[3]['name'] . '</td></tr>';
                    echo '<tr><td style="border: none">' . $this->userList[1]['code'] . ' - </td><td style="border: none; text-align:left;"> &nbsp' . $this->userList[1]['name'] . '</td><td style="border: none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style="border: none">' . $this->userList[4]['code'] . ' - </td><td style="border: none; text-align:left;">&nbsp' . $this->userList[4]['name'] . '</td></tr>';
                    echo '<tr><td style="border: none">' . $this->userList[2]['code'] . ' - </td><td style="border: none; text-align:left;"> &nbsp' . $this->userList[2]['name'] . '</td><td style="border: none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style="border: none">' . $this->userList[5]['code'] . ' - </td><td style="border: none; text-align:left;">&nbsp' . $this->userList[5]['name'] . '</td></tr>';
                } else {
                    echo '<tr><td style="border: none"> No required number of technical officers in the system!</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="yesPrint">
    <pre style="border: 0px">               Note: During the transmission hours & while ADE absent,
                    the most senior officer will be the shift officer.
    
    
    
                    DE(TX)                                         DDE(TX)
    </pre>
</div>





<?
$this->load->view('header');
?>
<style type="text/css">
		/*Custom Css Neplar Money*/
		.custom-btn{
		    background: rgb(38,189,154) !important;
		    color:#fff !important;
		}
		.custom-modal-close-btn{
		    font-size: 25px !important;
		    padding: 5px 25px !important;
		}
		.custom-tabs-btn{
			font-size: 16px !important;
			line-height: 33px;
		    padding: 5px 25px !important;
		    background-color: #fff;
		    border-radius: 2px;
		    border: 1px solid #e2e7ee;
		    color: #022b54;
		    font-size: 15px;
		}
		.custom-tabs-btn:focus, .custom-tabs-btn:active{
			outline: 0 !important;
		}
		.cust-modal-xl{
		    max-width: 1350px !important;
		}
		.header-title{
			line-height: 40px;
            margin: 5px 0 0px 15px;
		}
		.active-tab{
            border-bottom: 5px solid rgb(38,189,154);
            color: #000 !important;
            background-color: #f0f3f7 !important;
            font-weight: 600;
		}

		.active-sub-tab{
            border-left: 5px solid rgb(38,189,154);
            color: #000 !important;
            background-color: #f0f3f7 !important;
            font-weight: 600;
		}
		.custom-list-btns{
		    background-color: #fff;
		    font-size: 16px;
		    color: #022b54;
		    cursor: pointer;
		}
	</style>
	<style>
        .myfooter{
            
        }
        .dt-button{
            background: rgb(38,189,154) !important;
            color: #fff !important;
            outline: none !important;
            border:0 !important;
            padding: 2px 10px !important;
            margin: 3px !important;
            border-radius: 2px !important;
        }
        .paginate_button {
            background: rgb(38,189,154) !important;
            color: #fff !important;
            outline: none !important;
            border:0 !important;
            padding: 2px 10px !important;
            margin: 3px !important;
        }
        .set-icon{
           padding-left:0px !important; 
           margin: 2px !important;
        }
    </style>
<div class="container-fluid">
    <h5 class="mt-2"><a href="<?=base_url('Dashboard')?>" style="text-decoration: none"><i class="fa fa-hand-o-left"></i>&nbsp;Back</a></h5>
</div>

<div class="container-fluid">
    <div class="card rounded-0">
        <div class="card-header d-flex justify-content-between p-0" style="padding-right:5px !important">
            <div>
	            <h5 class="header-title">MProfit Reports :</h5>
	        </div>
            <div>
          		<span class="btn custom-tabs-btn rounded-0 active-tab" data="peformance">Performance</span>
            	<span class="btn custom-tabs-btn rounded-0" data="Capital-Gains">Capital Gains</span>
            	<span class="btn custom-tabs-btn rounded-0" data="Transactions">Transactions</span>
            	<span class="btn custom-tabs-btn rounded-0" data="logbook">LogBook</span>
            	<span class="btn custom-tabs-btn rounded-0" data="assset-allocation">Assset allocation</span>
            	<span class="btn custom-tabs-btn rounded-0" data="statement">Statements</span>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
	        		<div class="col-md-3 p-0">
	        			<div class="list-group rounded-0 custom-list-group">
							<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns active-sub-tab">ss</a>
							<a href="javascript:void(0);" class="list-group-item list-group-item-action custom-list-btns">Second</a>
							<a href="javascript:void(0);" class="list-group-item list-group-item-action custom-list-btns">Third</a>
						</div>
	        		</div>
	        		<div class="col-md-9 pl-1 pr-0">
	        			<div class="list-group rounded-0">
							<span class="list-group-item font-weight-bold">Group : Family | Portfolio: Arup</span>
						</div>
						<div>
						    <div class="card rounded-0 pb-2">
                                <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012/03/29</td>
                                        <td>$433,060</td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                        <td>$162,700</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>Integration Specialist</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>2012/12/02</td>
                                        <td>$372,000</td>
                                    </tr>
                                    <tr>
                                        <td>Herrod Chandler</td>
                                        <td>Sales Assistant</td>
                                        <td>San Francisco</td>
                                        <td>59</td>
                                        <td>2012/08/06</td>
                                        <td>$137,500</td>
                                    </tr>
                                    <tr>
                                        <td>Rhona Davidson</td>
                                        <td>Integration Specialist</td>
                                        <td>Tokyo</td>
                                        <td>55</td>
                                        <td>2010/10/14</td>
                                        <td>$327,900</td>
                                    </tr>
                                    <tr>
                                        <td>Colleen Hurst</td>
                                        <td>Javascript Developer</td>
                                        <td>San Francisco</td>
                                        <td>39</td>
                                        <td>2009/09/15</td>
                                        <td>$205,500</td>
                                    </tr>
                                    <tr>
                                        <td>Sonya Frost</td>
                                        <td>Software Engineer</td>
                                        <td>Edinburgh</td>
                                        <td>23</td>
                                        <td>2008/12/13</td>
                                        <td>$103,600</td>
                                    </tr>
                                    <tr>
                                        <td>Jena Gaines</td>
                                        <td>Office Manager</td>
                                        <td>London</td>
                                        <td>30</td>
                                        <td>2008/12/19</td>
                                        <td>$90,560</td>
                                    </tr>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>Support Lead</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2013/03/03</td>
                                        <td>$342,000</td>
                                    </tr>
                                    <tr>
                                        <td>Charde Marshall</td>
                                        <td>Regional Director</td>
                                        <td>San Francisco</td>
                                        <td>36</td>
                                        <td>2008/10/16</td>
                                        <td>$470,600</td>
                                    </tr>
                                    <tr>
                                        <td>Haley Kennedy</td>
                                        <td>Senior Marketing Designer</td>
                                        <td>London</td>
                                        <td>43</td>
                                        <td>2012/12/18</td>
                                        <td>$313,500</td>
                                    </tr>
                                    <tr>
                                        <td>Tatyana Fitzpatrick</td>
                                        <td>Regional Director</td>
                                        <td>London</td>
                                        <td>19</td>
                                        <td>2010/03/17</td>
                                        <td>$385,750</td>
                                    </tr>
                                    <tr>
                                        <td>Michael Silva</td>
                                        <td>Marketing Designer</td>
                                        <td>London</td>
                                        <td>66</td>
                                        <td>2012/11/27</td>
                                        <td>$198,500</td>
                                    </tr>
                                    <tr>
                                        <td>Paul Byrd</td>
                                        <td>Chief Financial Officer (CFO)</td>
                                        <td>New York</td>
                                        <td>64</td>
                                        <td>2010/06/09</td>
                                        <td>$725,000</td>
                                    </tr>
                                    <tr>
                                        <td>Gloria Little</td>
                                        <td>Systems Administrator</td>
                                        <td>New York</td>
                                        <td>59</td>
                                        <td>2009/04/10</td>
                                        <td>$237,500</td>
                                    </tr>
                                    <tr>
                                        <td>Bradley Greer</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                        <td>41</td>
                                        <td>2012/10/13</td>
                                        <td>$132,000</td>
                                    </tr>
                                    <tr>
                                        <td>Dai Rios</td>
                                        <td>Personnel Lead</td>
                                        <td>Edinburgh</td>
                                        <td>35</td>
                                        <td>2012/09/26</td>
                                        <td>$217,500</td>
                                    </tr>
                                    <tr>
                                        <td>Jenette Caldwell</td>
                                        <td>Development Lead</td>
                                        <td>New York</td>
                                        <td>30</td>
                                        <td>2011/09/03</td>
                                        <td>$345,000</td>
                                    </tr>
                                    <tr>
                                        <td>Yuri Berry</td>
                                        <td>Chief Marketing Officer (CMO)</td>
                                        <td>New York</td>
                                        <td>40</td>
                                        <td>2009/06/25</td>
                                        <td>$675,000</td>
                                    </tr>
                                    <tr>
                                        <td>Caesar Vance</td>
                                        <td>Pre-Sales Support</td>
                                        <td>New York</td>
                                        <td>21</td>
                                        <td>2011/12/12</td>
                                        <td>$106,450</td>
                                    </tr>
                                    <tr>
                                        <td>Doris Wilder</td>
                                        <td>Sales Assistant</td>
                                        <td>Sydney</td>
                                        <td>23</td>
                                        <td>2010/09/20</td>
                                        <td>$85,600</td>
                                    </tr>
                                    <tr>
                                        <td>Angelica Ramos</td>
                                        <td>Chief Executive Officer (CEO)</td>
                                        <td>London</td>
                                        <td>47</td>
                                        <td>2009/10/09</td>
                                        <td>$1,200,000</td>
                                    </tr>
                                    <tr>
                                        <td>Gavin Joyce</td>
                                        <td>Developer</td>
                                        <td>Edinburgh</td>
                                        <td>42</td>
                                        <td>2010/12/22</td>
                                        <td>$92,575</td>
                                    </tr>
                                    <tr>
                                        <td>Jennifer Chang</td>
                                        <td>Regional Director</td>
                                        <td>Singapore</td>
                                        <td>28</td>
                                        <td>2010/11/14</td>
                                        <td>$357,650</td>
                                    </tr>
                                    <tr>
                                        <td>Brenden Wagner</td>
                                        <td>Software Engineer</td>
                                        <td>San Francisco</td>
                                        <td>28</td>
                                        <td>2011/06/07</td>
                                        <td>$206,850</td>
                                    </tr>
                                    <tr>
                                        <td>Fiona Green</td>
                                        <td>Chief Operating Officer (COO)</td>
                                        <td>San Francisco</td>
                                        <td>48</td>
                                        <td>2010/03/11</td>
                                        <td>$850,000</td>
                                    </tr>
                                    <tr>
                                        <td>Shou Itou</td>
                                        <td>Regional Marketing</td>
                                        <td>Tokyo</td>
                                        <td>20</td>
                                        <td>2011/08/14</td>
                                        <td>$163,000</td>
                                    </tr>
                                    <tr>
                                        <td>Michelle House</td>
                                        <td>Integration Specialist</td>
                                        <td>Sydney</td>
                                        <td>37</td>
                                        <td>2011/06/02</td>
                                        <td>$95,400</td>
                                    </tr>
                                    <tr>
                                        <td>Suki Burks</td>
                                        <td>Developer</td>
                                        <td>London</td>
                                        <td>53</td>
                                        <td>2009/10/22</td>
                                        <td>$114,500</td>
                                    </tr>
                                    <tr>
                                        <td>Prescott Bartlett</td>
                                        <td>Technical Author</td>
                                        <td>London</td>
                                        <td>27</td>
                                        <td>2011/05/07</td>
                                        <td>$145,000</td>
                                    </tr>
                                    <tr>
                                        <td>Gavin Cortez</td>
                                        <td>Team Leader</td>
                                        <td>San Francisco</td>
                                        <td>22</td>
                                        <td>2008/10/26</td>
                                        <td>$235,500</td>
                                    </tr>
                                    <tr>
                                        <td>Martena Mccray</td>
                                        <td>Post-Sales support</td>
                                        <td>Edinburgh</td>
                                        <td>46</td>
                                        <td>2011/03/09</td>
                                        <td>$324,050</td>
                                    </tr>
                                    <tr>
                                        <td>Unity Butler</td>
                                        <td>Marketing Designer</td>
                                        <td>San Francisco</td>
                                        <td>47</td>
                                        <td>2009/12/09</td>
                                        <td>$85,675</td>
                                    </tr>
                                    <tr>
                                        <td>Howard Hatfield</td>
                                        <td>Office Manager</td>
                                        <td>San Francisco</td>
                                        <td>51</td>
                                        <td>2008/12/16</td>
                                        <td>$164,500</td>
                                    </tr>
                                    <tr>
                                        <td>Hope Fuentes</td>
                                        <td>Secretary</td>
                                        <td>San Francisco</td>
                                        <td>41</td>
                                        <td>2010/02/12</td>
                                        <td>$109,850</td>
                                    </tr>
                                    <tr>
                                        <td>Vivian Harrell</td>
                                        <td>Financial Controller</td>
                                        <td>San Francisco</td>
                                        <td>62</td>
                                        <td>2009/02/14</td>
                                        <td>$452,500</td>
                                    </tr>
                                    <tr>
                                        <td>Timothy Mooney</td>
                                        <td>Office Manager</td>
                                        <td>London</td>
                                        <td>37</td>
                                        <td>2008/12/11</td>
                                        <td>$136,200</td>
                                    </tr>
                                    <tr>
                                        <td>Jackson Bradshaw</td>
                                        <td>Director</td>
                                        <td>New York</td>
                                        <td>65</td>
                                        <td>2008/09/26</td>
                                        <td>$645,750</td>
                                    </tr>
                                    <tr>
                                        <td>Olivia Liang</td>
                                        <td>Support Engineer</td>
                                        <td>Singapore</td>
                                        <td>64</td>
                                        <td>2011/02/03</td>
                                        <td>$234,500</td>
                                    </tr>
                                    <tr>
                                        <td>Bruno Nash</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                        <td>38</td>
                                        <td>2011/05/03</td>
                                        <td>$163,500</td>
                                    </tr>
                                    <tr>
                                        <td>Sakura Yamamoto</td>
                                        <td>Support Engineer</td>
                                        <td>Tokyo</td>
                                        <td>37</td>
                                        <td>2009/08/19</td>
                                        <td>$139,575</td>
                                    </tr>
                                    <tr>
                                        <td>Thor Walton</td>
                                        <td>Developer</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>2013/08/11</td>
                                        <td>$98,540</td>
                                    </tr>
                                    <tr>
                                        <td>Finn Camacho</td>
                                        <td>Support Engineer</td>
                                        <td>San Francisco</td>
                                        <td>47</td>
                                        <td>2009/07/07</td>
                                        <td>$87,500</td>
                                    </tr>
                                    <tr>
                                        <td>Serge Baldwin</td>
                                        <td>Data Coordinator</td>
                                        <td>Singapore</td>
                                        <td>64</td>
                                        <td>2012/04/09</td>
                                        <td>$138,575</td>
                                    </tr>
                                    <tr>
                                        <td>Zenaida Frank</td>
                                        <td>Software Engineer</td>
                                        <td>New York</td>
                                        <td>63</td>
                                        <td>2010/01/04</td>
                                        <td>$125,250</td>
                                    </tr>
                                    <tr>
                                        <td>Zorita Serrano</td>
                                        <td>Software Engineer</td>
                                        <td>San Francisco</td>
                                        <td>56</td>
                                        <td>2012/06/01</td>
                                        <td>$115,000</td>
                                    </tr>
                                    <tr>
                                        <td>Jennifer Acosta</td>
                                        <td>Junior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>43</td>
                                        <td>2013/02/01</td>
                                        <td>$75,650</td>
                                    </tr>
                                    <tr>
                                        <td>Cara Stevens</td>
                                        <td>Sales Assistant</td>
                                        <td>New York</td>
                                        <td>46</td>
                                        <td>2011/12/06</td>
                                        <td>$145,600</td>
                                    </tr>
                                    <tr>
                                        <td>Hermione Butler</td>
                                        <td>Regional Director</td>
                                        <td>London</td>
                                        <td>47</td>
                                        <td>2011/03/21</td>
                                        <td>$356,250</td>
                                    </tr>
                                    <tr>
                                        <td>Lael Greer</td>
                                        <td>Systems Administrator</td>
                                        <td>London</td>
                                        <td>21</td>
                                        <td>2009/02/27</td>
                                        <td>$103,500</td>
                                    </tr>
                                    <tr>
                                        <td>Jonas Alexander</td>
                                        <td>Developer</td>
                                        <td>San Francisco</td>
                                        <td>30</td>
                                        <td>2010/07/14</td>
                                        <td>$86,500</td>
                                    </tr>
                                    <tr>
                                        <td>Shad Decker</td>
                                        <td>Regional Director</td>
                                        <td>Edinburgh</td>
                                        <td>51</td>
                                        <td>2008/11/13</td>
                                        <td>$183,000</td>
                                    </tr>
                                    <tr>
                                        <td>Michael Bruce</td>
                                        <td>Javascript Developer</td>
                                        <td>Singapore</td>
                                        <td>29</td>
                                        <td>2011/06/27</td>
                                        <td>$183,000</td>
                                    </tr>
                                    <tr>
                                        <td>Donna Snider</td>
                                        <td>Customer Support</td>
                                        <td>New York</td>
                                        <td>27</td>
                                        <td>2011/01/25</td>
                                        <td>$112,000</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
						</div>
	        		</div>
	        	</div>
        </div>
        <div class="card-footer">Footer</div>
    </div>
</div>
<?
$this->load->view('footer');
?>

<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

<script>
$(document).ready(function() {
    $('#data-table').DataTable({
        "bFilter": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false, 
        "info": false,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ]
    });
});
</script> 


<script type="text/javascript">

$(document).ready(function(){
	tabs_controll()
});

$(document).on("click","#report-model-btn",function(){
	$(".report-modal").modal("show");
});

function tabs_controll()
{
	var data = $(".active-tab").attr("data");
	if(data=="peformance")
    {
    	var html = '';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns active-sub-tab">Portfolio Summary</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Annualised Return (XIRR)</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Historical Valuation</a>';
        $(".custom-list-group").html(html);
    }

    if(data=="Capital-Gains")
    {
    	var html = '';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns active-sub-tab">Capital Gains - Summary</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Capital Gains - ITR Format</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Unrealised Capital Gains - Summary</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Sort Term Capital Gains(STCG)</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Long Term Capital Gains(LTCG)</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Unrealised Capital Gains - Detailed</a>';
        $(".custom-list-group").html(html);
    }

    if(data=="Transactions")
    {
    	var html = '';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns active-sub-tab">Contract Note Summary</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Stock Transactions</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Mutual Fund Transactions</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Contract Note Charges</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Mutual Fund Register</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">NPS Register</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Crypto Currency Register</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Bond/NCD Register</a>';
        $(".custom-list-group").html(html);
    }

    if(data=="logbook")
    {
    	var html = '';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns active-sub-tab">Closing Balance</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Holding Period</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Stock Register</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Mutual Fund Register</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">NPS Register</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Crypto Currency Register</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Bond/NCD Register</a>';
        $(".custom-list-group").html(html);
    }
    
    if(data=="statement")
    {
    	var html = '';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns active-sub-tab">Profit Loss Statement</a>';
        html +='<a href="javascript:void(0);"class="list-group-item list-group-item-action custom-list-btns">Cash flow Statement</a>';
        $(".custom-list-group").html(html);
    }
    
    if(data=="assset-allocation")
    {
    	var html = '';
        $(".custom-list-group").html(html);
    }

}
</script>
<script type="text/javascript">
	$(document).ready(function(){

	});

	$(document).on("click",".custom-tabs-btn",function(){
		$(".custom-tabs-btn").removeClass("active-tab");
	    $(this).addClass("active-tab");
	    tabs_controll(); 
	});

	$(document).on("click",".custom-list-btns",function(){
		$(".custom-list-btns").removeClass("active-sub-tab");
	    $(this).addClass("active-sub-tab"); 
	});
</script>
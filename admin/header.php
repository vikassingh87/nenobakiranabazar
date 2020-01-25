<style type="text/css" media="screen">
  @media only screen and (min-width: 768px){}
.form-horizontal .control-label {
    padding-top: 0px;
    margin-bottom: 0;
    text-align: right;
}
}
.control-label {
    color: deeppink;
}
.card-body:last-child {
    border-radius: 0 0 2px 2px;
}
.card-body {
    padding: 10px 24px 14px 24px;
    position: relative;
}
.card-head {
    border-radius: 2px 2px 0 0;
    border-bottom: 1px dotted rgba(0,0,0,0.2);
    padding: 2px;
    color: #3a405b;
    font-size: 14px;
    font-weight: 600;
    line-height: 40px;
    min-height: 40px;
}
.card-box {
    background: #fff;
    min-height: 50px;
    box-shadow: none;
    position: relative;
    margin-bottom: 20px;
    transition: .5s;
    border: 1px solid #f2f2f2;
    border-radius: 0;
    padding: 0 20px;
}
.card-head header {
    display: inline-block;
    padding: 11px 20px;
    vertical-align: middle;
    line-height: 17px;
    font-size: 20px;
}
.form-group1 {
    margin-bottom: 0;
}
</style>
<h5>WELCOME : ADMIN</h5>
<div class="card card-box" style='background-color: #ffffff;'>
               <div class="card-head">
                    <!-- <header>Personal Details</header> -->

                </div> 
                 <div class="card-body " id="bar-parent1">
                    <div class="text" style="background:#1dc083;">
                            <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="color: #fff; font-size: 22px; height: 35px; padding-top: 4px;">Welcome to Nenoba Kirana Bazar<div><br></div></marquee>
                        </div>
                </div> 
            </div>
            <br>



      <script type="text/javascript">
       document.getElementById("date").innerHTML = formatAMPM();

function formatAMPM() {
var d = new Date(),
    minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
    hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
    ampm = d.getHours() >= 12 ? 'pm' : 'am',
    months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
return days[d.getDay()]+' '+months[d.getMonth()]+' '+d.getDate()+' '+d.getFullYear()+' '+hours+':'+minutes+ampm;
}
      </script>
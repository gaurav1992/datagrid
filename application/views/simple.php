<? $this->load->view("header"); ?>
<? $this->load->view("script"); ?>
</head>

<body class="dt-example">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Dashboard</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">List <span class="sr-only">(current)</span></a></li>
        
        
      </ul>
     
    </div>
  </div>
</nav>
<div class="container-fluid">
<div class="row">

	<div class="col-lg-12">
			<h1 style="margin-bottom:32px;">Tenants</h1>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Tanent Admin Name</th>
						<th>Date</th>
						
					</tr>
				</thead>

				<tfoot>
					<tr>
						<th>Name</th>
						<th>Tanent Admin Name</th>
						<th>Date</th>
					</tr>
				</tfoot>
			</table>

		</div>
 </div>	
 </div>
</body>
</html>
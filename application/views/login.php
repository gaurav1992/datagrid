<? $this->load->view("header"); ?>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
            
            <?php 
					if($this->session->flashdata('login_error'))
					{
						echo '<div class="panel-heading">';
						echo '<strong class="">'.$this->session->flashdata('login_error').'</strong>';
						 echo'</div>';
					}else{
						echo '<div class="panel-heading">';
						echo '<strong class="">login</strong>';
						echo'</div>';
					}
					?>
                
					
               
               
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="<? echo site_url("config/login");?>" method="post">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="username" name="username" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                               <button type="submit" class="btn btn-success btn-sm">Sign in</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>

</body>
</html>
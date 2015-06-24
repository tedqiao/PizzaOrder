@extends('register')

@section('content')
<div class="container">
 <div class="col-lg-5">
            <div class="col-md-12">
                <div class="alert alert-success <?= $res===10?'':'sr-only'?>">
                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                </div>
                <div class="alert alert-danger <?= $res===2?'':'sr-only'?>">
                    <span class="glyphicon glyphicon-remove"></span><strong> Error! User name duplicate.</strong>
                </div>
                <div class="alert alert-danger <?= $res===1?'':'sr-only'?>">
                    <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                </div>
            </div>
        </div>
</div>
<div class="container <?= $res===10?'sr-only':''?>"  >
    <div class="row">
        
        <form action="<?=url('register')?>" method="post" onsubmit=" return validateEmail()" role="form">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Enter Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="Name" id="InputName" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Confirm Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="Emailsec" name="Emailsec" placeholder="Confirm Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="pwdsec" name="pwdsec" placeholder="Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputMessage">Enter Message</label>
                    <div class="input-group">
                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" onclick="" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
       
    </div>
</div>

@stop

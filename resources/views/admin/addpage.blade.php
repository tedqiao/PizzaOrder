@extends('master')
@section('aside')
<div id='side_bar' class="sidebar-nav">
    <ul>
        <li><a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"> Dashboard</a></li>
        <li><ul class="dashboard-menu nav nav-list ">
                <li><a href="index.html"></span> Main</a></li>
                <li><a href="users.html"></span> User List</a></li>
                <li><a href="user.html"></span> User Profile</a></li>
                <li><a href="media.html"></span> Media</a></li>
                <li><a href="calendar.html"></span> Calendar</a></li>
            </ul></li>
        <li><a href="help.html" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Help</a></li>

</div>
@endsection
@section('main')
<div id="main" class='col-sm-8'>
    <div  style="margin-left: 5%;">
        <div class="row"><h2><?= isset($res) ? "suceed" : "duplicate name" ?></h2>
        </div>

        <form action="<?= url('additem') ?>" method="post" onsubmit="" enctype="multipart/form-data" role="form">
            <div class="row">
                <div class="form-group">

                    <div for="iname" class="col-sm-2">
                        item Name:
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name='iname' id="iname" placeholder="Item Name">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div for="price" class="col-sm-2">
                        price
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Item price">
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div for="category" class="col-sm-2">
                        category:
                    </div>
                    <div class="col-sm-6">
                        <select name="category" id="category" class="form-control">
                        
                            <option>Salads </option>
                            <option>Calzones</option>
                            <option>Pizza</option>
                            <option>Club Sandwich</option>
                            <option>Gyros </option>
                        </select>
                    </div>




                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div for="uploadimage" class="col-sm-2">
                        Upload Image:
                    </div>
                    <div class="col-sm-6">
                        <input type="file" name="uploadimage" id="uploadimage">
                        <p class="help-block">
                            Allowed formats: jpeg, jpg, gif, png
                        </p>
                    </div>


                </div>


            </div>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-10">
                    <button type="submit" class="btn btn-info">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@stop
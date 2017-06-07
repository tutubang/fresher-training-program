<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <title>NTQ Solution Admin Control Panel</title>

    <link rel="icon" type="image/ico" href="TemplatePHP/favicon.ico"/>

    <link href="TemplatePHP/css/stylesheets.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<div class="header">
    <a class="logo" href="list-users.html">
        <img src="TemplatePHP/img/logo.png" alt="NTQ Solution - Admin Control Panel" title="NTQ Solution - Admin Control Panel"/>
    </a>

</div>

<div class="menu">

    <div class="breadLine">
        <div class="arrow"></div>
        <div class="adminControl active">
            Hi, Fresher
        </div>
    </div>

    <div class="admin">
        <div class="image">
            <img src="TemplatePHP/img/users/avatar.jpg" class="img-polaroid"/>
        </div>
        <ul class="control">
            <li><span class="icon-cog"></span> <a href="edit-user.html">Update Profile</a></li>
            <li><span class="icon-share-alt"></span> <a href="login.html">Logout</a></li>
        </ul>
    </div>

    <ul class="navigation">
        <li>
            <a href="list-users.html">
                <span class="isw-user"></span><span class="text">Users</span>
            </a>
        </li>
    </ul>

</div>

<div class="content">


    <div class="breadLine">

        <ul class="breadcrumb">
            <li><a href="list-users.html">List Users</a> <span class="divider">></span></li>
            <li class="active">Add</li>
        </ul>

    </div>

    <div class="workplace">

        <div class="row-fluid">

            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Users Management</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form method="post" action="index.php?c=home&a=add_user">
                        <div class="row-form">
                            <div class="span3">Username:</div>
                            <div class="span9"><input type="text" placeholder="some text value..." name="txtUsername"/></div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Email:</div>
                            <div class="span9"><input type="text" placeholder="some text value..." name="txtEmail"/></div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Password:</div>
                            <div class="span9"><input type="text" placeholder="some text value..." name="txtPassword"/></div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Upload Avatar:</div>
                            <div class="span9"><input type="file" name="file" size="19"></div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Activate:</div>
                            <div class="span9">
                                <select name="select">
                                    <option value="0">choose a option...</option>
                                    <option value="1" <?php if(isset($_POST['select']) && $_POST['select'] == 1) echo "selected"?>>Activate</option>
                                    <option value="2" <?php if(isset($_POST['select']) && $_POST['select'] == 2) echo "selected"?>>Deactivate</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <input class="btn btn-success" type="submit" value="create" name="btnCreate"/>
                            <div class="clear"></div>
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
        <div class="dr"><span></span></div>

    </div>

</div>

</body>
</html>
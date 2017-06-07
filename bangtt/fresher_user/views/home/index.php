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
        <img src="TemplatePHP/img/logo.png" alt="NTQ Solution - Admin Control Panel"
             title="NTQ Solution - Admin Control Panel"/>
    </a>

</div>

<div class="menu">

    <div class="breadLine">
        <div class="arrow"></div>
        <div class="adminControl active">
            <?php echo isset($_SESSION['account']['username']) ? "Hi! " . $_SESSION['account']['username'] : '' ?>
        </div>
    </div>

    <div class="admin">
        <div class="image">
            <img src="TemplatePHP/img/users/avatar.jpg" class="img-polaroid"/>
        </div>
        <ul class="control">
            <li><span class="icon-cog"></span> <a href="edit-user.html">Update Profile</a></li>
            <li><span class="icon-share-alt"></span> <a href="index.php?c=login&a=logout">Logout</a></li>
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
            <li><a href="list-users.html">List Users</a></li>
        </ul>

    </div>

    <div class="workplace">

        <div class="row-fluid">
            <div class="span12 search">
                <form>
                    <input type="text" class="span11" placeholder="Some text for search..." name="search"/>
                    <button class="btn span1" type="submit">Search</button>
                </form>
            </div>
        </div>
        <!-- /row-fluid-->

        <div class="row-fluid">

            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Users Management</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid table-sorting">
                    <a href="index.php?c=home&a=add_user" class="btn btn-add">Add User</a>
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"/></th>
                            <th width="15%" class="sorting"><a href="#">ID</a></th>
                            <th width="35%" class="sorting"><a href="#">Username</a></th>
                            <th width="20%" class="sorting"><a href="#">Activate</a></th>
                            <th width="10%" class="sorting"><a href="#">Time Created</a></th>
                            <th width="10%" class="sorting"><a href="#">Time Updated</a></th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>

                        <?php if (isset($_SESSION['list_user'])) { $list_user = $_SESSION['list_user'];};
                        //                        echo '<pre>';
                        //                        print_r($list_user);
                        if (isset($list_user)) {
                            foreach ($list_user as $key => $value) {
                                ?>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><?php echo $value['user_id'] ?></td>
                                    <td><?php echo $value['username'] ?></td>
                                    <td><?php if ($value['status'] == "1") {
                                            echo "<span class=\"text-success\">Activated</span>";
                                        } else {
                                            echo "<span class=\"text-error\">Deactivate</span>";
                                        } ?></td>
                                    <td><?php echo $value['user_time_created'] ?></td>
                                    <td><?php echo $value['user_time_updated'] ?></td>
                                    <td><a href="edit-user.html" class="btn btn-info">Edit</a></td>
                                </tr>
                                </tbody>
                            <?php }
                        } ?>
                    </table>
                    <div class="bulk-action">
                        <a href="#" class="btn btn-success">Activate</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div><!-- /bulk-action-->
                    <div class="dataTables_paginate">
                        <a class="first paginate_button paginate_button_disabled" href="#">First</a>
                        <a class="previous paginate_button paginate_button_disabled" href="#">Previous</a>
                        <span>
                            <a class="paginate_active" href="#">1</a>
                            <a class="paginate_button" href="#">2</a>
                        </span>
                        <a class="next paginate_button" href="#">Next</a>
                        <a class="last paginate_button" href="#">Last</a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
        <div class="dr"><span></span></div>

    </div>

</div>

</body>
</html>
<?php
function showLoginForm()
{
?>
    <form method="post">

        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname">

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw">

        <input type="submit" name="submit" value="Login">
        <input type="submit" name="register" value="Register">

    </form>
<?php
};

function registerform()
{
?>
    <form method="post">

        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname">

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw">

        <input type="submit" name="create" value="Create User">
        <input type="submit" name="cancel" value="Cancel">

    </form>
<?php
};

function addprod()
{
?>
    <form method="post">
        <table>
            <tr>
                <td> <label for="proname"><b>Product Name</b></label></td>
                <td><input type="text" placeholder="Enter Product name" name="proname"></td>
            </tr>
            <tr>
                <td><label for="descr"><b>Description</b></label></td>
                <td> <input type="text" placeholder="Enter Description" name="descr"></td>
            </tr>
            <tr>
                <td> <label for="price"><b>Price</b></label></td>
                <td> <input type="text" placeholder="Enter Price" name="price"></td>
            </tr>
            <tr>
                <td> <label for="link"><b>Link</b></label></td>
                <td> <input type="text" placeholder="Enter Product Link" name="link"></td>
            </tr>
            <tr>
                <td> <input type="submit" name="addprod" value="Add Product"></td>
            </tr>
        </table>
    </form>
<?php
};

function showorder(){
?>
<form method="post">
<input type="submit" name="showorder" value="Show Orders">
</form>
<?php
};
function showuser(){
?>
<form method="post">
<input type="submit" name="showusers" value="Show Users">
</form>
<?php
}
?>
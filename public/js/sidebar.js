class SideBar {
    constructor() {
        this.LoadSideBar();
    }

    LoadSideBar() {
        var pathName = window.location.pathname;
        var page = pathName.substring(pathName.lastIndexOf("/")+1);
        switch(page){
            case 'AddUser.php':
                $('a[href="AddUser.php"]').addClass('sidebar-selected');
                break;
            case 'Messages.php':
                $('a[href="Messages.php"]').addClass('sidebar-selected');
                break;
            case 'Home.php':
                $('a[href="Home.php"]').addClass('sidebar-selected');
                break;
        }

    }
}

var sidebar = new SideBar();
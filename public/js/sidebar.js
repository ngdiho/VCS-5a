class SideBar {
    constructor() {
        this.LoadSideBar();
    }

    LoadSideBar() {
        var pathName = window.location.pathname;
        var page = pathName.substring(pathName.lastIndexOf("/") + 1);
        switch (page) {
            case 'AddUser.php':
                $('#sidebar-wrapper a[href="AddUser.php"]').addClass('sidebar-selected');
                break;
            case 'Messages.php':
                $('#sidebar-wrapper a[href="Messages.php"]').addClass('sidebar-selected');
                break;
            case 'Assignments.php':
                $('#sidebar-wrapper a[href="Assignments.php"]').addClass('sidebar-selected');
                break;
            default:
                $('#sidebar-wrapper a[href="Home.php"]').addClass('sidebar-selected');
                break;
        }

    }
}

var sidebar = new SideBar();
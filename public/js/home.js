class Home {
    constructor() {
        this.Init();
    }

    Init() {
        $(document).on('click', 'a.delete-user', this.DeleteForward);
    }

    DeleteForward() {
        var userId = $(this).attr('userid');
        var fullName = $(this).attr('fullname');
        console.log(userId + " : " + fullName);

        $('#delete-modal-fullname').html(fullName);
        $('a#delete-user-forward').attr('href', '../controllers/DeleteController.php?userid=' + userId);
    }
}

var home = new Home();
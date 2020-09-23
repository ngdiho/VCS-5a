class Home {
    constructor() {
        this.Init();
    }

    Init() {
        $(document).on('click', 'a.delete-user', this.DeleteForward);
        $(document).on('click', 'a.delete-assignment', this.DeleteAssignForward);
    }

    DeleteForward() {
        var userId = $(this).attr('userid');
        var fullName = $(this).attr('fullname');
        console.log(userId + " : " + fullName);

        $('#delete-modal-fullname').html(fullName);
        $('a#delete-user-forward').attr('href', '../controllers/DeleteController.php?userid=' + userId);
    }

    DeleteAssignForward() {
        var assignID = $(this).attr('assignid');

        $('a#delete-assignment-forward').attr('href', '../controllers/DeleteAssignmentController.php?assignid=' + assignID);
    }
}

var home = new Home();
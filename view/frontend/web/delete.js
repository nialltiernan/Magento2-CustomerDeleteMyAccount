define(['jquery', 'Magento_Ui/js/modal/confirm'], function ($, confirm) {
    $('#delete-button').on('click',function () {
        confirm({
            title: 'Do you really want to delete your account?',
            content: 'This will delete all of your data',
            actions: {
                confirm: function() {
                    window.location.href = 'delete';
                },
            }
        });
    })
});

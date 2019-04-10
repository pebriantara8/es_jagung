  $('.jc_delete_self').confirm({
      title: 'Konfirmasi?',
      content: 'Anda yakin akan menghapus data yang dipilih?',
      buttons: {
          confirm: function () {
              location.href = this.$target.attr('href');
          },
          cancel: function () {
          },
      }
  });

  $('.jc_restore_self').confirm({
    title: 'Konfirmasi?',
    content: 'Anda yakin akan mengembalikan data yang sudah dihapus?',
    buttons: {
        confirm: function () {
            location.href = this.$target.attr('href');
        },
        cancel: function () {
        },
    }
});

$('.jc_delete_purge_self').confirm({
    title: 'Konfirmasi?',
    content: 'Anda yakin akan menghapus permanen data yang dipilih?',
    buttons: {
        confirm: function () {
            location.href = this.$target.attr('href');
        },
        cancel: function () {
        },
    }
});
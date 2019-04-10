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
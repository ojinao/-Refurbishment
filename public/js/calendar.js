$(function(){
    $('.delete_modal_open').on('click',function(){
    $('.js-modal_delete').fadeIn();
    var reserve_day = $(this).attr('reserve_day');
    var reserve_part = $(this).attr('reserve_part');
    var reserve_id = $(this).attr('reserve_id');
    $('.modal-reserve-day').text(reserve_day);
    $('.modal-reserve-part').text(reserve_part);
    $('.modal-delete-hidden').val(reserve_id);
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal_delete').fadeOut();
    return false;
  });
});

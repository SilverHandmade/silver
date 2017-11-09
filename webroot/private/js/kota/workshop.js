$(function() {

    function counter() {
        var x = 0;
        return function() {
            return x++;
        };
    }
    var count = {
        appendTo    : counter(),
        insertBefore: counter(),

        dmy: null
    };
    /* insertBefore() */
     $('#method-insertBefore').on('click', function() {
         var dom = '<p class="add">&lt;p&gt;追加されました: ' + count.insertBefore() + '個目&lt;/p&gt;</p>';
         var $target = $(this).siblings('form');
         $(dom).insertBefore($target);
     });

     /* appendTo() */
    $('#method-appendTo').on('click', function() {
        var dom = '<li class="add">&lt;li&gt;追加されました: ' + count.appendTo() + '個目&lt;/li&gt;</li>';
        var $target = $(this).next().next('form');
        $(dom).appendTo($target);
    });

});

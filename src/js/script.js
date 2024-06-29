let boughtItem = {
    customerNumber: '',
    items: {}
}

$('.btn-add').on('click', (e) => {
    $('.dynamic-tbody').empty();
    const itemArr = {
        "itemName": $('.item-name').val(),
        "itemQuantity": $('.item-quantity').val(),
        "itemPrice": $('.item-price').val(),
    };

    let customerNumber = $('.customerPhoneNumber').val();
    
    let storedItem = localStorage.getItem('ItemBought');
    if (storedItem) {
        boughtItem = JSON.parse(storedItem);
        if (boughtItem.customerNumber === customerNumber) {
            boughtItem.items.push(itemArr);
        } else {
            boughtItem = {
                customerNumber: customerNumber,
                items: [itemArr],
            };
        }
    } else {
        boughtItem = {
            customerNumber: customerNumber,
            items: [itemArr],
        };
    }

    localStorage.setItem('ItemBought', JSON.stringify(boughtItem));

    $('.customerPhoneNumber').attr("readonly",true);
    $('.item-name').val('');
    $('.item-quantity').val('1');
    $('.item-price').val('');

    if(boughtItem['items'].length > 0){
        function renderTable(){
            for (let i = 0; i < boughtItem['items'].length; i++) {
                let $tr = $('<tr>').attr('data-index', i);
    
                let $td1 = $('<td>').html((i + 1) + ".");
                let $td2 = $('<td>').html(boughtItem['items'][i].itemName);
                $td2.addClass('text-start');
                let $td3 = $('<td>').html(boughtItem['items'][i].itemQuantity);
                let $td4 = $('<td>').html(boughtItem['items'][i].itemPrice);
                let $td5 = $('<td>').html("<a href='#' class='delete-item'><img src='https://icongr.am/material/close.svg?size=24&color=FF0000'></a>");
            
                $tr.append($td1,$td2,$td3,$td4,$td5);
                $('.dynamic-tbody').append($tr);
            }
        }
        renderTable();
    } else{
        console.log("No Data");
    }
});

$('.menu-toggler').on('click',() => {
    $('.sidebar-wrapper').toggleClass('hidden');
    $('.content-refresh').toggleClass('expand');
})

$('.btn-cancel').on('click', () => {
    localStorage.removeItem('ItemBought');
    $('.dynamic-tbody').empty();
    $('.customerPhoneNumber').attr("readonly",false);
    $('.customerPhoneNumber').val('');
})



document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        document.querySelector('.loader-container').style.display = "none";
    },500);
   
})


function checkTableData(){
    if ($('.dynamic-tbody').children().length === 0) {
        $('.table-data').css('opacity' , '0');
        $('.btn-wrap-payment').css('opacity' , '0');
    } else {
        $('.table-data').css('opacity' , '1');
        $('.btn-wrap-payment').css('opacity' , '1');
    }
}
checkTableData();

setInterval(checkTableData, 100);

$(document).ready(function() {
    let paidItemData;
    setInterval(() => {
        paidItemData = localStorage.getItem('ItemBought');
    },500);

    $('.btn-pay').on('click', () => {
        if(paidItemData){
            $.ajax({
                url: 'config/payment.php',
                type: 'POST',
                contentType: 'application/json',
                data: paidItemData,
                success: function (response) {
                    let responseData = response;
                    window.location.href = 'config/save.php?data=' + encodeURIComponent(JSON.stringify(responseData));
                },
                error: function (xhr, status, error) {
                    console.error("Error" + status + '-' + error);
                }
            })
        }
    })

    if($('.localDataTester').hasClass('removed')){
        setTimeout(() => {
            localStorage.removeItem('ItemBought');
            $('.localDataTester').removeClass('removed');
        },2500);
    }
})
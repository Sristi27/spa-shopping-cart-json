function formatCurrency($float){

return parseFloat($float, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()

}
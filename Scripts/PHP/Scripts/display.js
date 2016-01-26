$('#country').on('change', function () {
    var condition = this.value === "India";

    $('#runindia').toggle(condition);
    $('#runworld').toggle(!condition);
});
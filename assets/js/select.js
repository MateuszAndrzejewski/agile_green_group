$( document ).ready(function() {
	console.log("works");
    var lang = "en";
    var wikipedia = "https://" + lang + ".wikipedia.org/wiki/";
    var synonym = "http://www.synonym.com/synonyms/";
    $('body').on('selectstart', function () {
        $(document).one('mouseup', function() {
            var selected = (this.getSelection());
            wikipedia += selected;
            synonym += selected;
            if(selected != "") {
                $('#search').modal({
                    show: true,
                });
                $('#selected').val(selected);
                $('#synonym').attr("href", synonym);
                $('#wikipedia').attr("href", wikipedia);
            }
        });
    });
    $('#language').on('change', function() {
        lang = this.value;
        wikipedia = "https://" + lang + ".wikipedia.org/wiki/";
        $('#wikipedia').attr("href", wikipedia);
    });
    $('#search').on('hidden.bs.modal', function () {
        lang = "en";
        wikipedia = "https://" + lang + ".wikipedia.org/wiki/";
		synonym = "http://www.synonym.com/synonyms/";
		selected.value = "";
		console.log(synonym);
        $('#wikipedia').attr("href", wikipedia);
		
    });
});
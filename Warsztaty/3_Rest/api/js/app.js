    $(document).ready(function () {

        var endpoint = window.location.pathname + "api/books.php"
        console.log(endpoint);

        //////////////////////////////////////////////////
        //ADD BOOK EVENT
        //////////////////////////////////////////////////

        $('form[name="addBook"]').on('submit', function (e) {
            e.preventDefault();
            console.log("przycisk");
            var postForm = {
                name: $('input[name=name]').val(),
                author: $('input[name=author]').val(),
                description: $('textarea').val()
            };

            $.ajax({
                url: endpoint,
                data: postForm,
                type: "POST",
                dataType: "json"
            })
                    .done(function (json) {
                        window.location.reload(true);
                    })
                    .fail(function () {
                        alert("wystąpił błąd przy dodawaniu ");
                    });
        });
        /////////////////////////
        //Show book name 
        ////////////////////////
        $.ajax({
            url: endpoint,
            data: {},
            type: "GET",
            dataType: "json"
        })
                .done(function (json) {
                    var books = json;
                    $.each(books, function (object, book) {
                        var book = $("<div id='" + book.id + "'' class='displayBoook'>" +
                                book.name + "</div>");
                        $('.bookList').append(book);
                    });

                    var name = $('.bookList div');
                    name.one('click', bookDescription);
                })

                .fail(function () {
                    alert("Brak książek w odebranych danych");
                });
        /////////////////////////
        //Show book details 
        /////////////////////////
        function bookDescription() {
            var display = $(this);
            $.ajax({
                url: endpoint,
                data: 'id=' + $(this).get(0).id,
                type: "GET",
                dataType: "json"
            })
                    .done(function (json) {
                        var bookDetails = json[0];
                        display.append("<div style='border:1px solid black'>autor :" + bookDetails.author + " Opis: " + bookDetails.description + "" +
                                '<form style="border:1px solid black" class="edit-form" >Edytuj książkę:<br>' +
                                '<input type="text" name="name" value="' + bookDetails.name + '"><br>' +
                                '<input type="text" name="author" value="' + bookDetails.author + '"><br>' +
                                '<textarea  name="description" cols="50" rows="5" maxlength="255">' + bookDetails.description + '</textarea>' +
                                '<br><input type="submit" class="edit" style="border:1px solid black" name="' +
                                bookDetails.id + '"></form><button class="delete" style="border:1px solid black" value="' +
                                bookDetails.id + '">Usuń</button><br></div>');

                        $('.delete').click(del);
                        $('.edit-form').on('submit', function (e) {
                            e.preventDefault();
                            editing(this)
                        });
                    });
        } // end of book description


        function editing(form) {

            var editForm = {
                id: $(form).find('.edit').attr("name"),
                name: $(form).find('[name="name"]').val(),
                author: $(form).find('[name="author"]').val(),
                description: $(form).find('textarea').val()
            };

            $.ajax({
                url: endpoint,
                data: editForm,
                type: "PUT",
                dataType: "json"
            })
                    .done(function (json) {
                        window.location.reload(true);
                    })
                    .fail(function () {
                        alert("wystąpił błąd przy edycji");
                    });
        }

        function del() {
            var del = $(this).attr('value');
            console.log(this)
            $.ajax({
                url: endpoint,
                data: 'id=' + del,
                type: "DELETE",
                dataType: "json"
            })
                    .done(function (json) {
                        location.reload(true);
                    })
                    .fail(function () {
                        alert("nie udało sie usunąć ");
                    });
        }
    }); // end of  document ready
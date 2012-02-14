var request;

var Page = {
load: function(url) {
    console.log('Load method called');
    Page.killRequests();
    request = $.ajax({
        url: url,
        success: function(data) {
            try {
                var jsondata = $.parseJSON(data);
                for(i in jsondata) {
                    var message = jsondata[i];
                    if(message.redirect) {
                        console.log('I have a redirect page');
                        if(message.redirect.indexOf('http') == 0) {
                            console.log('Redirecting to external site' + message.redirect);
                            window.location = message.redirect;
                        }
                        else {
                            console.log('Redirecting internally: ' + message.redirect);
                            Page.load(message.redirect);
                        }
                    }
                }
            }
            catch(e) {
                console.log('The page did not contain JSON data');
                Page.removeLoader();
                $('#appspace').html(data);
                console.log('finished loading non-JSON');
                window.history.pushState("string", "title", url); // I don't know what those two are for...
            }
        }
    });
},

addLoader: function() {
    $('#appspace').children().remove();
    var loader = $('<img id="load" src="/img/load.gif"/>');
    $('#appspace').append(loader);
},

removeLoader: function() {
    $('#appspace #load').remove();
},

submitForm: function(element, evt) {
    evt.preventDefault();
    var form = element.parents('form');
    var serial_data = form.serialize() + '&' + element.attr('name') + '=' + element.attr('value');
    form.children('.messages').remove();
    form.append('<div class="messages"></div>');
    var messages = form.children('.messages');
    messages.append('<img src="/img/load.gif"/>');
    
    Page.killRequests();
    request = $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        data: serial_data,
        success: function(data) {
            messages.children().remove();
            for(i in data)
            {
                message = data[i];
                if(message.text && !message.redirect)
                {

                    messages.append('<li class="' + message.class + '">' + message.text + '</li>');
                }
                if(message.redirect)
                {
                    form.children('.messages').remove();
                    func = 'Page.load("' + message.redirect + '");';
                    console.log(func);
                    if(message.text)
                    {
                        setTimeout(func, 500);
                    }
                    else
                    {
                        Page.load(message.redirect);
                    }
                }
            }
        }
    }); 
    return false; 
},

killRequests: function() {
    if(typeof request != 'undefined') { request.abort(); }
}

};

$(document).ready(function() {
    $('a').click(function(event) {
        event.preventDefault();
        Page.addLoader();
        Page.load($(this).attr('href'));
        return false;
    });

    $('form input[type=submit]').click(function(event) {
        Page.submitForm($(this), event);
    });


}); 

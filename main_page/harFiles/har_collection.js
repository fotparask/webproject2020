function readHarFile(input) {

    const har_entries = {
        "entries": [],
        "userID": 0
    }

    for (data_object of input.log.entries) {

        let entry = {
            startedDateTime: null,
            serverIPAddress: null,
            timings: {
                wait: null
            },
            request: {
                method: null,
                url: null,
                headers: {
                    content_type: null,
                    cache_control: null,
                    pragma: null,
                    expires: null,
                    age: null,
                    last_modified: null,
                    host: null
                }
            },
            response: {
                status: null,
                statusText: null,
                headers: {
                    content_type: null,
                    cache_control: null,
                    pragma: null,
                    expires: null,
                    age: null,
                    last_modified: null,
                    host: null
                }
            }
        }
        
        //exception handling.
        try {
            entry.startedDateTime = data_object.startedDateTime
            entry.serverIPAddress = data_object.serverIPAddress
            entry.timings.wait = data_object.timings.wait
            entry.request.method = data_object.request.method
            entry.request.url = data_object.request.url

            for (har_header of data_object.request.headers) {
                //exception handling.
                try {
                    switch (har_header.name) {
                        case "Age":
                            entry.request.headers.age = har_header.value
                            break
                        case "Cache-Control":
                            entry.request.headers.cache_control = har_header.value
                            break
                        case "Content-Type":
                            entry.request.headers.content_type = har_header.value
                            break
                        case "Expires":
                            entry.request.headers.expires = har_header.value
                            break
                        case "Last-Modified":
                            entry.request.headers.last_modified = har_header.value
                            break
                        case "Host":
                            entry.request.headers.host = har_header.value
                            break
                        case "Pragma":
                            entry.request.headers.pragma = har_header.value
                            break
                    }
                }
                catch (TypeError) {}
            }

            entry.response.status = data_object.response.status
            entry.response.statusText = data_object.response.statusText

            for (har_header of data_object.response.headers) {
                //exception handling.
                try {
                    switch (har_header.name) {
                        case "Age":
                            entry.request.headers.age = har_header.value
                            break
                        case "Cache-Control":
                            entry.request.headers.cache_control = har_header.value
                            break
                        case "Content-Type":
                            entry.request.headers.content_type = har_header.value
                            break
                        case "Expires":
                            entry.request.headers.expires = har_header.value
                            break
                        case "Last-Modified":
                            entry.request.headers.last_modified = har_header.value
                            break
                        case "Host":
                            entry.request.headers.host = har_header.value
                            break
                        case "Pragma":
                            entry.request.headers.pragma = har_header.value
                            break
                    }
                }
                catch (TypeError) {}
            }
            har_entries.entries.push(entry);
        }
        catch (TypeError) {}
    }

    return har_entries;
}


$(document).ready(() => {
    const license_color = $('.license_color_on_change')
    const good_driver = $('.good_driver_on_change')
    license_color.on("change", (e) => {
        if (e.target.value){
            if (e.target.value === 'green' || e.target.value === 'blue') {
                good_driver.val("無し");
            } else {
                good_driver.val("優良");
            }
        } else {
            good_driver.val("");
        }
    });
    // check input null
    $.validator.addMethod("check_input_null", function (value, element, options) {
        let check = /\S/.test(value)
        if (!check) {
            return false;
        }
        return true
    }, "");

    const franchiseInputId = $('#franchiseId');
    const agentInputID = $('#agentId');
    agentInputID.on("change", () => {
        franchiseInputId.val("");
        setSearchSession();
    });

    franchiseInputId.on("change", () => {
        setSearchSession();
    });

    setSearchSession = () => {
        var data = $('#search_form').serialize();
        var url = $('#search_form').attr('action');
        franchiseInputId.prop("disabled",true);
        agentInputID.prop("disabled",true);
        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: (data) => {
                if (data.status) {
                    let listFranchise = ``;
                    listFranchise += `<option>すべて</option>`
                    for (let index = 0; index < data.data.length; index++) {
                        listFranchise +=
                            `<option value="${data.data[index].id}" ${data.franchiseId ? (data.data[index].id === data.franchiseId ? "selected" : '') : ''}>${data.data[index].name}</option>`
                    }
                    franchiseInputId.html(listFranchise);
                    franchiseInputId.prop("disabled", false);
                    agentInputID.prop("disabled", false);
                    if (data.url != "") {
                        window.location.href = data.url;
                    } else {
                        window.location.reload();
                    }
                }
            }
        });
    }
});

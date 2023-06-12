$(function() {
    const stopStartDate = $('#stop_start_time'),
    stopEndDate = $('#stop_end_time');

    const stopEditStartDate = $('#stop_edit_start_time'),
    stopEditEndDate = $('#stop_edit_end_time');
    //set Timezone for moment
    moment.tz("Asia/Tokyo").format();

    const dateCurrent = moment.tz("Asia/Tokyo"),
                dateTimeYYYY_MM_DD_HH = dateCurrent.format("YYYY-MM-DD HH"),
                dateTimeYYYY_MM_DD_HH_PLUS_30M = dateCurrent.add(30, 'minutes').format("YYYY-MM-DD HH"),
                dateTimeYYYY_MM_DD_HH_PLUS_60M = dateCurrent.add(60, 'minutes').format("YYYY-MM-DD HH"),
                minutes = new Date().getMinutes(),
                startTimeDate = parseInt(minutes) >= 30 ? dateTimeYYYY_MM_DD_HH_PLUS_30M + ':00' :
                    dateTimeYYYY_MM_DD_HH + ':30',
                endTimeDate = parseInt(minutes) >= 30 ? dateTimeYYYY_MM_DD_HH_PLUS_30M + ':30' :
                dateTimeYYYY_MM_DD_HH_PLUS_60M + ':00';

    stopStartDate.datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        sideBySide: true,
        stepping: 30,
        locale: 'ja',
        timeZone: "Asia/Tokyo",
        buttons: {
            showClose: true
        },
        icons: {
            close: 'close-datetimepicker'
        }
    });
    stopEndDate.datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        sideBySide: true,
        stepping: 30,
        locale: 'ja',
        // maxDate: `${dateTimeYYYY_MM_DD_HH_PLUS_7day}:00`,
        //daysOfWeekDisabled: [0, 6],
        timeZone: "Asia/Tokyo",
        // disabledDates: list_holiday,
        buttons: {
            showClose: true
        },
        icons: {
            close: 'close-datetimepicker'
        }
    });

    stopEditStartDate.datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        sideBySide: true,
        stepping: 30,
        locale: 'ja',
        timeZone: "Asia/Tokyo",
        buttons: {
            showClose: true
        },
        icons: {
            close: 'close-datetimepicker'
        }
    });
    stopEditEndDate.datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        sideBySide: true,
        stepping: 30,
        locale: 'ja',
        // maxDate: `${dateTimeYYYY_MM_DD_HH_PLUS_7day}:00`,
        //daysOfWeekDisabled: [0, 6],
        timeZone: "Asia/Tokyo",
        // disabledDates: list_holiday,
        buttons: {
            showClose: true
        },
        icons: {
            close: 'close-datetimepicker'
        }
    });
});
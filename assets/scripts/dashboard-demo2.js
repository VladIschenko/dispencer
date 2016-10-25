/**
 * Created by vlad on 21.10.16.
 */
$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010-10-10',
            bur: 50,
            stella: 20,
            chernigov: 33
        }, {
            period: '2010-10-11',
            bur: 45,
            stella: 47,
            chernigov: 30
        }, {
            period: '2010-10-12',
            bur: 24,
            stella: 37,
            chernigov: 32
        }, {
            period: '2010-10-13',
            bur: 53,
            stella: 42,
            chernigov: 21
        }, {
            period: '2010-10-14',
            bur: 42,
            stella: 53,
            chernigov: 51
        }, {
            period: '2010-10-15',
            bur: 78,
            stella: 56,
            chernigov: 60
        }, {
            period: '2010-10-16',
            bur: 50,
            stella: 20,
            chernigov: 33
        }, {
            period: '2010-10-17',
            bur: 42,
            stella: 29,
            chernigov: 12
        }, {
            period: '2010-10-18',
            bur: 50,
            stella: 20,
            chernigov: 33
        }, {
            period: '2010-10-19',
            bur: 60,
            stella: 44,
            chernigov: 52
        }],
        xkey: 'period',
        ykeys: ['bur', 'stella', 'chernigov'],
        labels: ['Таежный бур', 'Стелла', 'Черниговское'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

});

$(function () {
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Таежный бур",
            value: 32
        }, {
            label: "Стелла",
            value: 30
        },{
            label: "Эль",
            value: 22
        },{
            label: "Лагер",
            value: 14
        }, {
            label: "Черниговское",
            value: 20
        }],
        resize: true
    });
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
    Morris.Line({
        element: 'sell',
        data: [{
            period: '2010-1',
            bur:14
        }, {
            period: '2010-2',
            bur: 6
        }, {
            period: '2010-3',
            bur: 9
        }, {
            period: '2010-4',
            bur: 12
        }, {
            period: '2010-5',
            bur: 10
        }, {
            period: '2010-6',
            bur: 13
        }, {
            period: '2010-7',
            bur: 12
        }, {
            period: '2010-8',
            bur: 13
        }, {
            period: '2010-9',
            bur: 9
        }, {
            period: '2010-10',
            bur: 8
        }],
        xkey: 'period',
        ykeys: ['bur'],
        labels: ['Продано'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });
});

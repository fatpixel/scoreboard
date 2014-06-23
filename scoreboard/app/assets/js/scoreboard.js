this.Scoreboard = (function (window, document, $, _) {

    'use strict';
    var playerData = [],
        playersTemplate = _.template([
            '<% _.forEach(data, function(player) { %>',
            '<li class="player" data-player-id="<%= player.id %>" data-player-name="<%= player.name %>" data-player>',
            '<span class="name"><%= player.name %></span>',
            '<span class="highscore"><%= player.highscore %></span>',
            '</li>',
            '<% }); %>'
        ].join('')),
        docElem = document.documentElement,
        _userAgentInit = function () {
            docElem.setAttribute('data-useragent', navigator.userAgent);
        },
        _initPlayerData = function (data) {
            playerData = data.players || [];
        },
        _awardPointsToPlayer = function (points, player_id, cb) {
            return $.ajax({
                url: '/api/players/' + player_id + '/award/' + points,
                dataType: 'jsonp',
                success: cb
            });
        },
        _fetchPlayers = function (cb) {
            return $.ajax({
                url: '/api/players',
                dataType: 'jsonp',
                success: cb
            });
        },
        _renderPlayers = function (players) {
            var html = playersTemplate(players);
            $('.players').empty().html($(html));
        },
        _init = function (selector) {
            $(document).foundation();
            _userAgentInit();

            return $(selector);
        };


    return {
        init: _init,
        setPlayers: _initPlayerData,
        renderPlayers: _renderPlayers,
        fetchPlayers: _fetchPlayers,
        award: _awardPointsToPlayer
    };

})(this, this.document, jQuery, this._);

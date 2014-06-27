this.Scoreboard = (function (window, document, $, hogan) {

    'use strict';
    /**
     * Shorthand for $.Deferred constructor; reduces $.property lookups
     *
     * @constructor
     */
    var Deferred = $.Deferred;
    /**
     * Shorthand for $.noop
     *
     * @constructor
     */
    var _noop = $.noop;
    /**
     * Get a deferred object
     *
     * @access private
     * @return $.Deferred
     */
    var _defer = function () {
        return new Deferred();
    };
    /**
     *
     */
    var $players;
    /**
     *
     * @type {{data: {players: Array}}}
     */
    var Hoganizer = {
            data: {
                players: []
            }
        },
        /**
         *
         * @returns Deferred
         * @private
         */
        _refreshPlayers = function (playerId) {
            var deferredRender = _defer();

            deferredRender.done(function (result) {
                var $rendered = _render(result, Hoganizer.data);
                if (playerId) {
                    $rendered.find('[data-player="' + playerId + '"]').addClass('selected');
                }
            });

            return _fetchPlayers().done(function (response) {
                console.log('Players Fetched', response);

                deferredRender.resolve({
                    players: response.data
                });

                return deferredRender;
            });
        },
        /**
         *
         * @param playerId
         * @param points
         * @param cb
         * @returns {*}
         * @private
         */
        _award = function (playerId, points, cb) {
            return $.ajax({
                url: '/api/players/' + playerId + '/award/' + points,
                dataType: 'jsonp',
                success: cb || _noop
            }).done(function () {
                return _refreshPlayers(playerId);
            });
        },
        _fetchPlayers = function (cb) {
            return $.ajax({
                url: '/api/players',
                dataType: 'jsonp',
                success: cb || _noop
            });
        },
        _render = function (context, cache) {
            var rendered = Hoganizer.players.render(
                context ? context : {
                    players: context.data || cache.players
                }
            );

            $players.empty();
            return $players.append($(rendered));
        },
        _init = function (selector) {

            $(document).foundation();

            var source = $('#template--players').html();
            Hoganizer.players = hogan.compile(source);

            $players = $('ul.players').parent();

            return $(selector);
        };


    return {
        init: _init,
        award: _award,
        fetchPlayers: _fetchPlayers,
        refreshPlayers: _refreshPlayers,
        render: _render
    };

}(this, this.document, jQuery, Hogan));

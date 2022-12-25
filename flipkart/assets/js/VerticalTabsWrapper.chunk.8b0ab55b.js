(window.webpackJsonp = window.webpackJsonp || []).push([
    [215], {
        1001: function(e, t, n) {
            e.exports = {
                "tabs-container": "_3b2u_i",
                "tab-header": "_1lAxBa",
                underlined: "MyMeJx",
                "tab-headers-content": "_16HS6a",
                "tab-header--active": "_2bTsdG",
                solid: "_27g0Xk",
                "scroll-header": "M86omP",
                "tabs-headers": "_2y_80Q",
                "tabs-scroll-left": "_3R-t0U",
                "tabs-scroll-right": "_1v7bxX",
                "tabs-headers-underline": "opAP9C",
                "tabs-headers-slider": "OgYTuL",
                "tab-content-wrapper": "_3fn8Mj"
            }
        },
        1206: function(e, t, n) {
            "use strict";
            var a = n(0),
                r = n(1),
                o = n.n(r),
                i = n(4),
                s = n.n(i),
                c = n(22),
                l = n(1207),
                u = n.n(l),
                d = n(476),
                h = n(26),
                f = n(19),
                p = n(24),
                b = n(38),
                v = function() {
                    function e(e, t) {
                        for (var n = 0; n < t.length; n++) {
                            var a = t[n];
                            a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
                        }
                    }
                    return function(t, n, a) {
                        return n && e(t.prototype, n), a && e(t, a), t
                    }
                }();
            var m = function(e) {
                    function t() {
                        return function(e, t) {
                                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                            }(this, t),
                            function(e, t) {
                                if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                                return !t || "object" != typeof t && "function" != typeof t ? e : t
                            }(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
                    }
                    return function(e, t) {
                        if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                        e.prototype = Object.create(t && t.prototype, {
                            constructor: {
                                value: e,
                                enumerable: !1,
                                writable: !0,
                                configurable: !0
                            }
                        }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                    }(t, a["Component"]), v(t, [{
                        key: "shouldComponentUpdate",
                        value: function(e) {
                            return !Object(b.a)(this.props, e)
                        }
                    }, {
                        key: "render",
                        value: function() {
                            var e = this,
                                t = this.props,
                                n = t.widget,
                                r = t.router,
                                i = o()(n, ["data", "renderableComponents", 0, "value"]);
                            return a.createElement("div", {
                                className: u.a["sidebar-col"]
                            }, a.createElement(d.a, null, a.createElement("div", {
                                className: u.a["notif-prefs"]
                            }, a.createElement("div", {
                                className: u.a.header
                            }, a.createElement(c.L, null), a.createElement("span", null, i.text)), a.createElement("ul", null, i.items.map(function(t, n) {
                                return a.createElement(h.a, {
                                    key: n,
                                    to: o()(t, "action.url"),
                                    onClick: e.props.setIsNestedPage
                                }, a.createElement("li", {
                                    className: s()(function(e, t, n) {
                                        return t in e ? Object.defineProperty(e, t, {
                                            value: n,
                                            enumerable: !0,
                                            configurable: !0,
                                            writable: !0
                                        }) : e[t] = n, e
                                    }({}, u.a.active, o()(t, "value.nodeId") === o()(r, "params.channel")))
                                }, o()(t, "value.text")))
                            })))))
                        }
                    }]), t
                }(),
                y = {
                    setIsNestedPage: p.n
                };
            t.a = Object(f.b)(null, y)(Object(h.e)(m))
        },
        1207: function(e, t, n) {
            e.exports = {
                "sidebar-col": "_1QpIzp",
                "notif-prefs": "_3uHmim",
                header: "L5gBJv",
                active: "_2Lehiv"
            }
        },
        1354: function(e, t, n) {
            e.exports = {
                "horizontal-tabs": "_2ID8iM",
                "tab-container": "_2bWBYk",
                "tab-header": "_1vFiZd",
                "tab-header--active": "_3Pk-31",
                "left-margin": "_3iT0at"
            }
        },
        1479: function(e, t, n) {
            "use strict";
            n.r(t);
            var a = n(0),
                r = n(1),
                o = n.n(r),
                i = n(1206),
                s = n(4),
                c = n.n(s),
                l = n(26),
                u = n(19),
                d = n(990),
                h = n(24),
                f = n(38),
                p = n(1354),
                b = n.n(p),
                v = function() {
                    function e(e, t) {
                        for (var n = 0; n < t.length; n++) {
                            var a = t[n];
                            a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
                        }
                    }
                    return function(t, n, a) {
                        return n && e(t.prototype, n), a && e(t, a), t
                    }
                }();
            var m = function(e) {
                    function t() {
                        ! function(e, t) {
                            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                        }(this, t);
                        var e = function(e, t) {
                            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                            return !t || "object" != typeof t && "function" != typeof t ? e : t
                        }(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments));
                        return e.activeTab = 0, e.handleTabChange = function(t) {
                            var n = e.props,
                                a = n.widget,
                                r = n.router,
                                i = n.setIsNestedPage;
                            "function" == typeof i && i();
                            var s = o()(a, ["data", "renderableComponents", 0, "value"]),
                                c = o()(s.items[t], ["action", "url"]);
                            r.push(c)
                        }, e.renderTabs = function(t) {
                            return t.items.map(function(t, n) {
                                var r = o()(t, "value.selected"),
                                    i = o()(t, "value.text");
                                return r && (e.activeTab = n), a.createElement("div", {
                                    key: i
                                }, a.createElement("div", {
                                    className: r ? b.a.active : ""
                                }, i))
                            })
                        }, e
                    }
                    return function(e, t) {
                        if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                        e.prototype = Object.create(t && t.prototype, {
                            constructor: {
                                value: e,
                                enumerable: !1,
                                writable: !0,
                                configurable: !0
                            }
                        }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                    }(t, a["Component"]), v(t, [{
                        key: "shouldComponentUpdate",
                        value: function(e) {
                            return !Object(f.a)(this.props, e)
                        }
                    }, {
                        key: "render",
                        value: function() {
                            var e = this.props.widget,
                                t = o()(e, ["data", "renderableComponents", 0, "value"]),
                                n = this.renderTabs(t);
                            return a.createElement(d.b, {
                                onTabChange: this.handleTabChange,
                                containerStyle: c()(b.a["horizontal-tabs"], b.a["tab-container"]),
                                tabHeaderClassName: b.a["tab-header"],
                                activeTabHeaderClassName: b.a["tab-header--active"],
                                tabStateMargin: 0,
                                padding: 0,
                                activeTab: this.activeTab
                            }, n)
                        }
                    }]), t
                }(),
                y = {
                    setIsNestedPage: h.n
                },
                _ = Object(u.b)(null, y)(Object(l.e)(m)),
                g = n(475);
            t.default = function(e) {
                var t = e.widget,
                    n = o()(t, "viewType");
                return n === g.e.NAV_MENU ? a.createElement(i.a, e) : n === g.e.NAV_MENU_HORIZONTAL ? a.createElement(_, e) : null
            }
        },
        990: function(e, t, n) {
            "use strict";
            n.d(t, "a", function() {
                return f
            }), n.d(t, "b", function() {
                return v
            });
            var a = n(0),
                r = n(1),
                o = n.n(r),
                i = n(4),
                s = n.n(i),
                c = n(477),
                l = n(1001),
                u = n.n(l),
                d = function() {
                    function e(e, t) {
                        for (var n = 0; n < t.length; n++) {
                            var a = t[n];
                            a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
                        }
                    }
                    return function(t, n, a) {
                        return n && e(t.prototype, n), a && e(t, a), t
                    }
                }();

            function h(e, t, n) {
                return t in e ? Object.defineProperty(e, t, {
                    value: n,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }) : e[t] = n, e
            }
            var f, p, b = 160;
            ! function(e) {
                e.UNDERLINED = "underlined", e.SOLID = "solid"
            }(f || (f = {})),
            function(e) {
                e.LEFT = "left", e.RIGHT = "right"
            }(p || (p = {}));
            var v = function(e) {
                function t(e) {
                    ! function(e, t) {
                        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                    }(this, t);
                    var n = function(e, t) {
                        if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                        return !t || "object" != typeof t && "function" != typeof t ? e : t
                    }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                    return n._scrollableAmount = 0, n._headerLengths = [], n._containerWidth = 0, n.container = null, n.tabHeaders = null, n._sliderStart = 0, n._sliderWidth = 0, n.handleTabChange = function(e) {
                        return function() {
                            if (!(e < 0 || e > n._headerLengths.length - 1) && e !== n.state.activeTab) {
                                n.updateSliderPosition(e), n.setState({
                                    activeTab: e
                                });
                                var t = n._headerLengths.reduce(function(t, n, a) {
                                        return e <= a ? t : t + n
                                    }, 0),
                                    a = n._headerLengths[e],
                                    r = n.state.scrolledAmount,
                                    o = t - r,
                                    i = void 0;
                                o < 0 ? (i = r - Math.abs(o) - 10, n.setState({
                                    scrolledAmount: i < 0 ? 0 : i
                                })) : o + a >= n._containerWidth && (i = t - n._containerWidth + a, n.setState({
                                    scrolledAmount: i
                                })), n.props.onTabChange && n.props.onTabChange(e)
                            }
                        }
                    }, n.handleScroll = function(e) {
                        return function() {
                            var t = n.state.scrolledAmount;
                            if (e === p.RIGHT) {
                                var a = n._scrollableAmount - t;
                                if (a) {
                                    var r = a > b ? b : a;
                                    n.setState({
                                        scrolledAmount: t + r
                                    })
                                }
                            } else if (t) {
                                var o = t > b ? b : t;
                                n.setState({
                                    scrolledAmount: t - o
                                })
                            }
                        }
                    }, n.containerRef = function(e) {
                        return n.container = e
                    }, n.tabHeadersRef = function(e) {
                        return n.tabHeaders = e
                    }, n.state = {
                        activeTab: e.activeTab || 0,
                        scrolledAmount: 0
                    }, n
                }
                return function(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }(t, a["Component"]), d(t, [{
                    key: "componentDidMount",
                    value: function() {
                        this.setup()
                    }
                }, {
                    key: "componentWillReceiveProps",
                    value: function(e) {
                        var t = e.activeTab;
                        void 0 !== t && t <= this._headerLengths.length - 1 && t >= 0 && t !== this.props.activeTab && this.setState({
                            activeTab: t
                        }, this.setup)
                    }
                }, {
                    key: "setup",
                    value: function() {
                        var e = this.tabHeaders;
                        this._containerWidth = this.container ? this.container.clientWidth : 0, e && (this._headerLengths = Array.prototype.slice.call(e.children).slice(0, -1).map(function(e) {
                            return e.offsetWidth
                        })), this._scrollableAmount = this._headerLengths.reduce(function(e, t) {
                            return e + t
                        }, 0) - this._containerWidth, this._scrollableAmount < 0 && (this._scrollableAmount = 0), this.updateSliderPosition(), this.handleTabChange(this.state.activeTab), this.container && this.forceUpdate()
                    }
                }, {
                    key: "updateSliderPosition",
                    value: function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : this.state.activeTab,
                            t = this._headerLengths.reduce(function(t, n, a) {
                                return a < e && (t += n), t
                            }, 0);
                        this._sliderStart = t, this._sliderWidth = this._headerLengths[e]
                    }
                }, {
                    key: "render",
                    value: function() {
                        var e = this,
                            t = a.Children.toArray(this.props.children).reduce(function(e, t) {
                                var n = o()(t, "props.children");
                                return Array.isArray(n) ? (e.headers.push(n[0]), e.contents.push(n[1])) : e.headers.push(n), e
                            }, {
                                headers: [],
                                contents: []
                            }),
                            n = this.props,
                            r = n.tabStateMargin,
                            i = void 0 === r ? 12 : r,
                            l = n.padding,
                            d = void 0 === l ? 12 : l,
                            b = n.activeTabHeaderClassName,
                            v = void 0 === b ? "" : b,
                            m = n.tabHeaderClassName,
                            y = void 0 === m ? "" : m,
                            _ = n.headerId,
                            g = void 0 === _ ? "" : _,
                            E = n.containerStyle,
                            w = void 0 === E ? "" : E,
                            T = n.tabHeaderStyle,
                            O = void 0 === T ? f.UNDERLINED : T,
                            N = n.contentStyle,
                            j = void 0 === N ? {} : N,
                            C = this.state,
                            S = C.activeTab,
                            P = C.scrolledAmount,
                            k = this._sliderStart,
                            A = this._sliderWidth,
                            L = !S && i || 0,
                            H = A ? Object(c.a)({
                                transform: "translateX(" + (k + i + L) + "px) scaleX(" + (A - 2 * d - L) + ")"
                            }) : {};
                        return a.createElement("div", {
                            className: s()(u.a["tabs-container"], w),
                            ref: this.containerRef
                        }, a.createElement("div", {
                            id: g,
                            className: s()(u.a["tabs-headers"], u.a[O])
                        }, a.createElement("div", {
                            className: u.a["tab-headers-content"]
                        }, a.createElement("div", {
                            style: {
                                width: this._headerLengths.reduce(function(e, t) {
                                    return e + t
                                }, 0) + 20
                            }
                        }, a.createElement("div", {
                            style: Object.assign({}, Object(c.a)({
                                transform: "translateX(-" + P + "px)"
                            }), {
                                whiteSpace: "nowrap"
                            }),
                            ref: this.tabHeadersRef,
                            className: u.a["scroll-header"]
                        }, t.headers.map(function(t, n) {
                            var r;
                            return a.createElement("div", {
                                key: "th" + n,
                                className: s()(u.a["tab-header"], (r = {}, h(r, u.a["tab-header--active"], S === n), h(r, v, S === n), h(r, y, Boolean(y)), r)),
                                onClick: e.handleTabChange(n)
                            }, t)
                        }), O === f.UNDERLINED ? a.createElement("div", {
                            className: u.a["tabs-headers-underline"]
                        }, a.createElement("div", {
                            className: u.a["tabs-headers-slider"],
                            style: H
                        })) : a.createElement("span", null))), P > 0 && a.createElement("span", {
                            onClick: this.handleScroll(p.LEFT),
                            className: u.a["tabs-scroll-left"]
                        }, "‹"), this._scrollableAmount - P > 0 && a.createElement("span", {
                            onClick: this.handleScroll(p.RIGHT),
                            className: u.a["tabs-scroll-right"]
                        }, "›"))), a.createElement("div", null, a.createElement("div", {
                            className: u.a["tab-content-wrapper"],
                            style: j
                        }, a.createElement("div", {
                            className: u.a["tab-content"]
                        }, t.contents[S]))))
                    }
                }]), t
            }()
        }
    }
]);
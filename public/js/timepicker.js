! function() {
    function t(t) {
        return document.createElementNS(r, t)
    }

    function i(t) {
        return (t < 10 ? "0" : "") + t
    }

    function e(t) {
        var i = ++v + "";
        return t ? t + i : i
    }

    function s(s, c) {
        function r(t, i) {
            var e = h.offset(),
                s = /^touch/.test(t.type),
                o = e.left + f,
                n = e.top + f,
                r = (s ? t.originalEvent.touches[0] : t).pageX - o,
                l = (s ? t.originalEvent.touches[0] : t).pageY - n,
                u = Math.sqrt(r * r + l * l),
                k = !1;
            if (!i || !(u < b - w || u > b + w)) {
                t.preventDefault();
                var v = setTimeout(function() {
                    V.popover.addClass("clockpicker-moving")
                }, 200);
                p && h.append(V.canvas), V.setHand(r, l, !i, !0), a.off(d).on(d, function(t) {
                    t.preventDefault();
                    var i = /^touch/.test(t.type),
                        e = (i ? t.originalEvent.touches[0] : t).pageX - o,
                        s = (i ? t.originalEvent.touches[0] : t).pageY - n;
                    (k || e !== r || s !== l) && (k = !0, V.setHand(e, s, !1, !0))
                }), a.off(m).on(m, function(t) {
                    a.off(m), t.preventDefault();
                    var e = /^touch/.test(t.type),
                        s = (e ? t.originalEvent.changedTouches[0] : t).pageX - o,
                        p = (e ? t.originalEvent.changedTouches[0] : t).pageY - n;
                    (i || k) && s === r && p === l && V.setHand(s, p), "hours" === V.currentView ? V.toggleView("minutes", M / 2) : c.autoclose && (V.minutesView.addClass("clockpicker-dial-out"), setTimeout(function() {
                        V.done()
                    }, M / 2)), h.prepend(X), clearTimeout(v), V.popover.removeClass("clockpicker-moving"), a.off(d)
                })
            }
        }
        var l = n(A),
            h = l.find(".clockpicker-plate"),
            k = l.find(".picker__holder"),
            v = l.find(".clockpicker-hours"),
            P = l.find(".clockpicker-minutes"),
            C = l.find(".clockpicker-am-pm-block"),
            x = "INPUT" === s.prop("tagName"),
            T = x ? s : s.find("input"),
            _ = n("label[for=" + T.attr("id") + "]"),
            V = this;
        if (this.id = e("cp"), this.element = s, this.holder = k, this.options = c, this.isAppended = !1, this.isShown = !1, this.currentView = "hours", this.isInput = x, this.input = T, this.label = _, this.popover = l, this.plate = h, this.hoursView = v, this.minutesView = P, this.amPmBlock = C, this.spanHours = l.find(".clockpicker-span-hours"), this.spanMinutes = l.find(".clockpicker-span-minutes"), this.spanAmPm = l.find(".clockpicker-span-am-pm"), this.footer = l.find(".picker__footer"), this.amOrPm = "PM", c.twelvehour) {
            var H = ['<div class="clockpicker-am-pm-block">', '<button type="button" class="btn-floating btn-flat clockpicker-button clockpicker-am-button">', "AM", "</button>", '<button type="button" class="btn-floating btn-flat clockpicker-button clockpicker-pm-button">', "PM", "</button>", "</div>"].join("");
            n(H);
            c.ampmclickable ? (this.spanAmPm.empty(), n('<div id="click-am">AM</div>').on("click", function() {
                V.spanAmPm.children("#click-am").addClass("text-primary"), V.spanAmPm.children("#click-pm").removeClass("text-primary"), V.amOrPm = "AM"
            }).appendTo(this.spanAmPm), n('<div id="click-pm">PM</div>').on("click", function() {
                V.spanAmPm.children("#click-pm").addClass("text-primary"), V.spanAmPm.children("#click-am").removeClass("text-primary"), V.amOrPm = "PM"
            }).appendTo(this.spanAmPm)) : (n('<button type="button" class="btn-floating btn-flat clockpicker-button am-button" tabindex="1">AM</button>').on("click", function() {
                V.amOrPm = "AM", V.amPmBlock.children(".pm-button").removeClass("active"), V.amPmBlock.children(".am-button").addClass("active"), V.spanAmPm.empty().append("AM")
            }).appendTo(this.amPmBlock), n('<button type="button" class="btn-floating btn-flat clockpicker-button pm-button" tabindex="2">PM</button>').on("click", function() {
                V.amOrPm = "PM", V.amPmBlock.children(".am-button").removeClass("active"), V.amPmBlock.children(".pm-button").addClass("active"), V.spanAmPm.empty().append("PM")
            }).appendTo(this.amPmBlock))
        }
        T.attr("type", "text");
        var D = ((this.options["default"] || this.input.prop("value") || "now") + "").split(":"),
            S = ((this.options["default"] || this.input.prop("value") || "now") + "").split(":");
        if (this.options.twelvehour && "undefined" != typeof D[1]) {
            var I = parseInt(D[0]);
            D[0] = 0 == I ? 12 : I > 12 ? I - 12 : I, D[1] = D[1] + (I < 12 ? "AM" : "PM")
        }
        if ("now" === D[0]) {
            this.options["default"] = "now";
            var B = new Date(+new Date + this.options.fromnow),
                I = B.getHours(),
                j = B.getMinutes();
            D = c.twelvehour ? [i(0 == I ? 12 : I > 12 ? I - 12 : I), i(j) + (I < 12 ? "AM" : "PM")] : [i(I), i(j)], S = [i(I), i(j), "00"], T.prop({
                "default": S.join(":")
            }).data({
                "default": S.join(":"),
                submit: S.join(":")
            }).attr({
                "data-default": S.join(":"),
                "data-submit": S.join(":")
            })
        } else T.prop({
            value: D[0] + ":" + D[1]
        }).data({
            submit: S.join(":")
        }).attr({
            value: D[0] + ":" + D[1],
            "data-submit": S.join(":")
        });
        c.darktheme && l.addClass("darktheme"), n('<button type="button" class="btn-flat clockpicker-button" tabindex="' + (c.twelvehour ? "3" : "1") + '">' + c.donetext + "</button>").click(n.proxy(this.done, this)).appendTo(this.footer), n('<button type="button" class="btn-flat clockpicker-button" tabindex="' + (c.twelvehour ? "4" : "2") + '">' + c.cleartext + "</button>").click(n.proxy(this.clearInput, this)).appendTo(this.footer), this.spanHours.click(n.proxy(this.toggleView, this, "hours")), this.spanMinutes.click(n.proxy(this.toggleView, this, "minutes")), T.on("focus.clockpicker click.clockpicker", n.proxy(this.show, this));
        var E, O, z, U, L = n('<div class="clockpicker-tick"></div>');
        if (c.twelvehour)
            for (E = 1; E < 13; E += 1) O = L.clone(), z = E / 6 * Math.PI, U = b, O.css("font-size", "140%"), O.css({
                left: f + Math.sin(z) * U - w,
                top: f - Math.cos(z) * U - w
            }), O.html(0 === E ? "00" : E), v.append(O), O.on(u, r);
        else
            for (E = 0; E < 24; E += 1) {
                O = L.clone(), z = E / 6 * Math.PI;
                var N = E > 0 && E < 13;
                U = N ? g : b, O.css({
                    left: f + Math.sin(z) * U - w,
                    top: f - Math.cos(z) * U - w
                }), N && O.css("font-size", "120%"), O.html(0 === E ? "00" : E), v.append(O), O.on(u, r)
            }
        for (E = 0; E < 60; E += 5) O = L.clone(), z = E / 30 * Math.PI, O.css({
            left: f + Math.sin(z) * b - w,
            top: f - Math.cos(z) * b - w
        }), O.css("font-size", "140%"), O.html(i(E)), P.append(O), O.on(u, r);
        if (h.on(u, function(t) {
                0 === n(t.target).closest(".clockpicker-tick").length && r(t, !0)
            }), p) {
            var X = l.find(".clockpicker-canvas"),
                Y = t("svg");
            Y.setAttribute("class", "clockpicker-svg"), Y.setAttribute("width", y), Y.setAttribute("height", y);
            var q = t("g");
            q.setAttribute("transform", "translate(" + f + "," + f + ")");
            var F = t("circle");
            F.setAttribute("class", "clockpicker-canvas-bearing"), F.setAttribute("cx", 0), F.setAttribute("cy", 0), F.setAttribute("r", 2);
            var W = t("line");
            W.setAttribute("x1", 0), W.setAttribute("y1", 0);
            var G = t("circle");
            G.setAttribute("class", "clockpicker-canvas-bg"), G.setAttribute("r", w);
            var Q = t("circle");
            Q.setAttribute("class", "clockpicker-canvas-fg"), Q.setAttribute("r", 5), q.appendChild(W), q.appendChild(G), q.appendChild(Q), q.appendChild(F), Y.appendChild(q), X.append(Y), this.hand = W, this.bg = G, this.fg = Q, this.bearing = F, this.g = q, this.canvas = X
        }
        o(this.options.init)
    }

    function o(t) {
        t && "function" == typeof t && t()
    }
    var n = window.jQuery,
        c = n(window),
        a = n(document),
        r = "http://www.w3.org/2000/svg",
        p = "SVGAngle" in window && function() {
            var t, i = document.createElement("div");
            return i.innerHTML = "<svg/>", t = (i.firstChild && i.firstChild.namespaceURI) == r, i.innerHTML = "", t
        }(),
        l = function() {
            var t = document.createElement("div").style;
            return "transition" in t || "WebkitTransition" in t || "MozTransition" in t || "msTransition" in t || "OTransition" in t
        }(),
        h = "ontouchstart" in window,
        u = "mousedown" + (h ? " touchstart" : ""),
        d = "mousemove.clockpicker" + (h ? " touchmove.clockpicker" : ""),
        m = "mouseup.clockpicker" + (h ? " touchend.clockpicker" : ""),
        k = navigator.vibrate ? "vibrate" : navigator.webkitVibrate ? "webkitVibrate" : null,
        v = 0,
        f = 135,
        b = 110,
        g = 80,
        w = 20,
        y = 2 * f,
        M = l ? 350 : 1,
        A = ['<div class="clockpicker picker">', '<div class="picker__holder">', '<div class="picker__frame">', '<div class="picker__wrap">', '<div class="picker__box">', '<div class="picker__date-display">', '<div class="clockpicker-display">', '<div class="clockpicker-display-column">', '<span class="clockpicker-span-hours text-primary"></span>', ":", '<span class="clockpicker-span-minutes"></span>', "</div>", '<div class="clockpicker-display-column clockpicker-display-am-pm">', '<div class="clockpicker-span-am-pm"></div>', "</div>", "</div>", "</div>", '<div class="picker__calendar-container">', '<div class="clockpicker-plate">', '<div class="clockpicker-canvas"></div>', '<div class="clockpicker-dial clockpicker-hours"></div>', '<div class="clockpicker-dial clockpicker-minutes clockpicker-dial-out"></div>', "</div>", '<div class="clockpicker-am-pm-block">', "</div>", "</div>", '<div class="picker__footer">', "</div>", "</div>", "</div>", "</div>", "</div>", "</div>"].join("");
    s.DEFAULTS = {
        "default": "",
        fromnow: 0,
        donetext: "Done",
        cleartext: "Clear",
        autoclose: !1,
        ampmclickable: !1,
        darktheme: !1,
        twelvehour: !0,
        vibrate: !0,
        submit: ""
    }, s.prototype.toggle = function() {
        this[this.isShown ? "hide" : "show"]()
    }, s.prototype.locate = function() {
        var t = this.element,
            i = this.popover;
        t.offset(), t.outerWidth(), t.outerHeight(), this.options.align;
        i.show()
    }, s.prototype.show = function(t) {
        if (this.setAMorPM = function(t) {
                var i = t,
                    e = "pm" == t ? "am" : "pm";
                this.options.twelvehour && (this.amOrPm = i.toUpperCase(), this.options.ampmclickable ? (this.spanAmPm.children("#click-" + i).addClass("text-primary"), this.spanAmPm.children("#click-" + e).removeClass("text-primary")) : (this.amPmBlock.children("." + e + "-button").removeClass("active"), this.amPmBlock.children("." + i + "-button").addClass("active"), this.spanAmPm.empty().append(this.amOrPm)))
            }, !this.isShown) {
            o(this.options.beforeShow), n(":input").each(function() {
                n(this).attr("tabindex", -1)
            });
            var e = this;
            this.input.blur(), this.popover.addClass("picker--opened"), this.input.addClass("picker__input picker__input--active"), n(document.body).css("overflow", "hidden"), this.isAppended || (this.options.hasOwnProperty("container") ? this.popover.appendTo(this.options.container) : this.popover.insertAfter(this.input), this.setAMorPM("pm"), c.on("resize.clockpicker" + this.id, function() {
                e.isShown && e.locate()
            }), this.isAppended = !0);
            var s = ((this.options["default"] || this.input.prop("value") || "now") + "").split(":");
            if (this.options.twelvehour && "undefined" != typeof s[1] && (s[1].includes("AM") || parseInt(s[0]) < 12 ? this.setAMorPM("am") : this.setAMorPM("pm"), s[1] = s[1].replace("AM", "").replace("PM", "")), "now" === s[0]) {
                var r = new Date(+new Date + this.options.fromnow);
                r.getHours() >= 12 ? this.setAMorPM("pm") : this.setAMorPM("am"), s = [r.getHours(), r.getMinutes()]
            }
            this.hours = +s[0] || 0, this.minutes = +s[1] || 0, this.spanHours.html(i(this.hours)), this.spanMinutes.html(i(this.minutes)), this.toggleView("hours"), this.locate(), this.isShown = !0, a.on("click.clockpicker." + this.id + " focusin.clockpicker." + this.id, function(t) {
                var i = n(t.target);
                0 === i.closest(e.popover.find(".picker__wrap")).length && 0 === i.closest(e.input).length && e.hide()
            }), a.on("keyup.clockpicker." + this.id, function(t) {
                27 === t.keyCode && e.hide()
            }), o(this.options.afterShow)
        }
    }, s.prototype.hide = function() {
        o(this.options.beforeHide), this.input.removeClass("picker__input picker__input--active"), this.popover.removeClass("picker--opened"), n(document.body).css("overflow", "visible"), this.isShown = !1, n(":input").each(function(t) {
            n(this).attr("tabindex", t + 1)
        }), a.off("click.clockpicker." + this.id + " focusin.clockpicker." + this.id), a.off("keyup.clockpicker." + this.id), this.popover.hide(), o(this.options.afterHide)
    }, s.prototype.toggleView = function(t, i) {
        var e = !1;
        "minutes" === t && "visible" === n(this.hoursView).css("visibility") && (o(this.options.beforeHourSelect), e = !0);
        var s = "hours" === t,
            c = s ? this.hoursView : this.minutesView,
            a = s ? this.minutesView : this.hoursView;
        this.currentView = t, this.spanHours.toggleClass("text-primary", s), this.spanMinutes.toggleClass("text-primary", !s), a.addClass("clockpicker-dial-out"), c.css("visibility", "visible").removeClass("clockpicker-dial-out"), this.resetClock(i), clearTimeout(this.toggleViewTimer), this.toggleViewTimer = setTimeout(function() {
            a.css("visibility", "hidden")
        }, M), e && o(this.options.afterHourSelect)
    }, s.prototype.resetClock = function(t) {
        var i = this.currentView,
            e = this[i],
            s = "hours" === i,
            o = Math.PI / (s ? 6 : 30),
            n = e * o,
            c = s && e > 0 && e < 13 ? g : b,
            a = Math.sin(n) * c,
            r = -Math.cos(n) * c,
            l = this;
        p && t ? (l.canvas.addClass("clockpicker-canvas-out"), setTimeout(function() {
            l.canvas.removeClass("clockpicker-canvas-out"), l.setHand(a, r)
        }, t)) : this.setHand(a, r)
    }, s.prototype.setHand = function(t, e, s, o) {
        var c, a = Math.atan2(t, -e),
            r = "hours" === this.currentView,
            l = Math.PI / (r || s ? 6 : 30),
            h = Math.sqrt(t * t + e * e),
            u = this.options,
            d = r && h < (b + g) / 2,
            m = d ? g : b;
        if (u.twelvehour && (m = b), a < 0 && (a = 2 * Math.PI + a), c = Math.round(a / l), a = c * l, u.twelvehour ? r ? 0 === c && (c = 12) : (s && (c *= 5), 60 === c && (c = 0)) : r ? (12 === c && (c = 0), c = d ? 0 === c ? 12 : c : 0 === c ? 0 : c + 12) : (s && (c *= 5), 60 === c && (c = 0)), r ? this.fg.setAttribute("class", "clockpicker-canvas-fg") : c % 5 == 0 ? this.fg.setAttribute("class", "clockpicker-canvas-fg") : this.fg.setAttribute("class", "clockpicker-canvas-fg active"), this[this.currentView] !== c && k && this.options.vibrate && (this.vibrateTimer || (navigator[k](10), this.vibrateTimer = setTimeout(n.proxy(function() {
                this.vibrateTimer = null
            }, this), 100))), this[this.currentView] = c, this[r ? "spanHours" : "spanMinutes"].html(i(c)), !p) return void this[r ? "hoursView" : "minutesView"].find(".clockpicker-tick").each(function() {
            var t = n(this);
            t.toggleClass("active", c === +t.html())
        });
        o || !r && c % 5 ? (this.g.insertBefore(this.hand, this.bearing), this.g.insertBefore(this.bg, this.fg), this.bg.setAttribute("class", "clockpicker-canvas-bg clockpicker-canvas-bg-trans")) : (this.g.insertBefore(this.hand, this.bg), this.g.insertBefore(this.fg, this.bg), this.bg.setAttribute("class", "clockpicker-canvas-bg"));
        var v = Math.sin(a) * (m - w),
            f = -Math.cos(a) * (m - w),
            y = Math.sin(a) * m,
            M = -Math.cos(a) * m;
        this.hand.setAttribute("x2", v), this.hand.setAttribute("y2", f), this.bg.setAttribute("cx", y), this.bg.setAttribute("cy", M), this.fg.setAttribute("cx", y), this.fg.setAttribute("cy", M)
    }, s.prototype.clearInput = function() {
        this.label.removeClass("active"), this.input.val(""), this.hide(), this.options.afterDone && "function" == typeof this.options.afterDone && this.options.afterDone(this.input, null)
    }, s.prototype.done = function() {
        o(this.options.beforeDone), this.hide(), this.label.addClass("active");
        var t = this.input.prop("value"),
            e = i(this.hours) + ":" + i(this.minutes);
        submit = i(this.hours) + ":" + i(this.minutes) + ":00", this.options.twelvehour && (e += this.amOrPm, "PM" == this.amOrPm ? submit = (this.hours < 12 ? this.hours + 12 : 12) + ":" + i(this.minutes) + ":00" : submit = (this.hours < 12 ? i(this.hours) : "00") + ":" + i(this.minutes) + ":00"), this.input.prop({
            value: e
        }).data({
            submit: submit
        }).attr({
            value: e,
            "data-submit": submit
        }), this.options["default"] = submit, e !== t && (this.input.triggerHandler("change"), this.isInput || this.element.trigger("change")), this.options.autoclose && this.input.trigger("blur"), console.log(this.input, submit), this.options.afterDone && "function" == typeof this.options.afterDone && this.options.afterDone(this.input, submit)
    }, s.prototype.remove = function() {
        this.element.removeData("clockpicker"), this.input.off("focus.clockpicker click.clockpicker"), this.isShown && this.hide(), this.isAppended && (c.off("resize.clockpicker" + this.id), this.popover.remove())
    }, n.fn.pickatime = function(t) {
        var i = Array.prototype.slice.call(arguments, 1);
        return this.each(function() {
            var e = n(this),
                o = e.data("clockpicker");
            if (o) "function" == typeof o[t] && o[t].apply(o, i);
            else {
                var c = n.extend({}, s.DEFAULTS, e.data(), "object" == typeof t && t);
                e.data("clockpicker", new s(e, c))
            }
        })
    }
}();
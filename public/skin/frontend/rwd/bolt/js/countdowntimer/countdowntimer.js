(function(e) {
    function n() {
        var e = new Date;
        var t = e.getTimezoneOffset() * 60;
        return t
    }
    var e = jQuery.noConflict();
    var t = new Object;
    e.fn.serverTime = function(n, r, i, s, o, u, a, f) {
        var r = r;
        var l = i;
        var s = s;
        var o = o;
        var c = jQuery.extend({
            ajaxFile: u + "countdowntimer/countdowntimer.php",
            displayDateFormat: "h:MM:ss TT Z"
        }, n);
        t.displayDateFormat = c["displayDateFormat"];
        p = new Date;
        e.fn.serverTime.getServerTime(parseInt(p.getTime() / 1e3), u);
        var h;
        SecondsLeft = 0;
        var p = new Date;
        var h = e.fn.serverTime.adjustTime(t.timediff, t.secDiffGMT, p);
        var d = e.fn.serverTime.tickSecond(h, t.timediff, t.secDiffGMT, r, i, s, o, a, f);
        if (d == 0) {
            return 0
        }
    };
    e.fn.serverTime.getServerTime = function(t, n) {
        e.ajax({
            async: false,
            method: "get",
            url: n + "countdowntimer/countdowntimer.php?localstamp=" + t,
            dataType: "text",
            success: e.fn.serverTime.response
        })
    };
    e.fn.serverTime.response = function(e) {
        var n = e.split("|");
        t.timediff = parseInt(n[0]) * 1e3;
        t.secDiffGMT = n[1];
        return
    };
    e.fn.serverTime.tickSecond = function(t, r, i, s, o, u, a, f, l) {
        var c = new Date;
        w = new Date;
        FinishTime = new Date;
        var h = "";
        var p;
        var d;
        var v;
        var m;
        var t;
        t = e.fn.serverTime.adjustTime(r, i, c);
        var g = n();
        var y = parseInt(t) + parseInt(g) * 1e3 + parseInt(i) * 1e3;
        w.setTime(y);
        var b = 0;
        var o = new Date(o);
        var w = new Date(w);
        b = o.getTime() - w.getTime();
        delete dateNow;
        if (b < 0) {
            T = "";
            location.reload();
            return 0
        } else {
            var E = 0;
            var S = 0;
            var m = 0;
            var v = 0;
            var x = 0;
            var p = 0;
            var T = "";
            var N = 0;
            var C = 0;
            var k = 0;
            var L = 0;
            b = b / 1e3;
            E = Math.floor(b / (365 * 60 * 60 * 24));
            S = Math.floor((b - E * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            m = Math.floor((b - E * 365 * 60 * 60 * 24 - S * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            v = Math.floor((b - E * 365 * 60 * 60 * 24 - S * 30 * 60 * 60 * 24 - m * 60 * 60 * 24) / (60 * 60));
            x = Math.floor((b - E * 365 * 60 * 60 * 24 - S * 30 * 60 * 60 * 24 - m * 60 * 60 * 24 - v * 60 * 60) / 60);
            p = Math.floor(b - E * 365 * 60 * 60 * 24 - S * 30 * 60 * 60 * 24 - m * 60 * 60 * 24 - v * 60 * 60 - x * 60);
            N = m + S * 30 + E * 365;
            C = S + E * 12;
            k = N * 24 + v;
            L = k * 60 + x;
            var A = 0;
            if (l == 2 || l == 3 || l == 5 || l == 8) A = 1;
            else A = 0;
            var O = 1;
            if (l == 4 || l == 6 || l == 7) O = 0;
            else O = 1;
            T += '<div class="heading">' + a + '</div> <div class="digit-holder">';
            switch (u) {
                case "0":
                    break;
                case "1":
                    if (l == 9) {
                        T = '<div class="heading">' + a + ' : </div> <div class="countdown-content">' + E + " years " + S + " months " + m + " days " + v + " hours " + x + " minutes " + p + " seconds </div>"
                    } else {
                        if (!A) {
                            T += '<div class="heading-digit1"><div class="numbers"><div class="heading-number">';
                            T += E + '</div></div><div class="heading-label"> yrs </div></div>';
                            if (O) T += '<div class="heading-colon1">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + S + '</div></div><div class="heading-label"> mon </div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + m + '</div></div><div class="heading-label"> day </div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + v + '</div></div><div class="heading-label"> hrs </div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + x + '</div></div><div class="heading-label"> min </div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + p + '</div></div><div class="heading-label"> sec </div></div>'
                        } else {
                            T += '<div class="heading-digit">';
                            sNumber = E.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                year_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + year_i + "</div></div>"
                            }
                            T += '<div class="heading-label">year</div></div><div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = S.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                months_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + months_i + "</div></div>"
                            }
                            T += '<div class="heading-label">mon</div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = m.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                days_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + days_i + "</div></div>"
                            }
                            T += '<div class="heading-label">day</div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = v.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                hours_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + hours_i + "</div></div>"
                            }
                            T += '<div class="heading-label">hrs</div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = x.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                minuts_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + minuts_i + "</div></div>"
                            }
                            T += '<div class="heading-label">min</div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = p.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                seconds_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + seconds_i + "</div></div>"
                            }
                            T += '<div class="heading-label">sec</div></div>'
                        }
                    }
                    break;
                case "2":
                    if (l == 9) {
                        T = '<div class="heading">' + a + ' : </div> <div class="countdown-content">' + N + " days " + v + " hours " + x + " minutes " + p + " seconds </div>"
                    } else {
                        if (!A) {
                            T += '<div class="heading-digit1"><div class="numbers"><div class="heading-number">' + N + '</div></div><div class="heading-label"> day </div></div>';
                            if (O) T += '<div class="heading-colon1">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + v + '</div></div><div class="heading-label"> hrs </div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + x + '</div></div><div class="heading-label"> min </div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + p + '</div></div><div class="heading-label"> sec </div></div>'
                        } else {
                            T += '<div class="heading-digit">';
                            sNumber = N.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                days_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + days_i + "</div></div>"
                            }
                            T += '<div class="heading-label">day</div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = v.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                hours_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + hours_i + "</div></div>"
                            }
                            T += '<div class="heading-label">hrs</div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = x.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                minuts_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + minuts_i + "</div></div>"
                            }
                            T += '<div class="heading-label">min</div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = p.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                seconds_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + seconds_i + "</div></div>"
                            }
                            T += '<div class="heading-label">sec</div></div>'
                        }
                    }
                    break;
                case "3":
                    if (l == 9) {
                        T = '<div class="heading">' + a + ' : </div> <div class="countdown-content">' + E + " years " + S + " months " + m + " days </div>"
                    } else {
                        if (!A) {
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + E + '</div></div><div class="heading-label"> yrs </div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + S + '</div></div><div class="heading-label"> mon </div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + m + '</div></div><div class="heading-label"> day </div></div>'
                        } else {
                            T += '<div class="heading-digit">';
                            sNumber = E.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                year_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + year_i + "</div></div>"
                            }
                            T += '<div class="heading-label">year</div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = S.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                months_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + months_i + "</div></div>"
                            }
                            T += '<div class="heading-label">mon</div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = m.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                days_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + days_i + "</div></div>"
                            }
                            T += '<div class="heading-label">day</div></div>'
                        }
                    }
                    break;
                case "4":
                    if (l == 9) {
                        T = '<div class="heading">' + a + ' : </div> <div class="countdown-content">' + C + " months " + m + " days </div>"
                    } else {
                        if (!A) {
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + C + '</div></div><div class="heading-label"> mon </div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + m + '</div></div><div class="heading-label"> day </div></div>'
                        } else {
                            T += '<div class="heading-digit">';
                            sNumber = C.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                months_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + months_i + "</div></div>"
                            }
                            T += '<div class="heading-label">mon</div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = m.toString();
                            if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                days_i = +sNumber.charAt(M);
                                T += '<div class="numbers"><div class="heading-number">' + days_i + "</div></div>"
                            }
                            T += '<div class="heading-label">day</div></div>'
                        }
                    }
                    break;
                case "5":
                    if (l == 9) {
                        T = '<div class="heading">' + a + ' : </div> <div class="countdown-content">' + N + " days </div>"
                    } else {
                        if (!A) {
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + N + '</div></div><div class="heading-label"> day </div></div>'
                        } else {
                            T += '<div class="heading-digit">';
                            sNumber = N.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                days_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + days_i + "</div></div>"
                            }
                            T += '<div class="heading-label">day</div></div>'
                        }
                    }
                    break;
                case "6":
                    if (l == 9) {
                        T = '<div class="heading">' + a + ' : </div> <div class="countdown-content">' + k + " hours " + x + " minutes " + p + " seconds </div>"
                    } else {
                        if (!A) {
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + k + '</div></div><div class="heading-label"> hrs </div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + x + '</div></div><div class="heading-label"> min </div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit"><div class="numbers"><div class="heading-number">' + p + '</div></div><div class="heading-label"> sec </div></div>'
                        } else {
                            T += '<div class="heading-digit">';
                            sNumber = k.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                hours_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + hours_i + "</div></div>"
                            }
                            T += '<div class="heading-label">hrs</div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = x.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                minuts_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + minuts_i + "</div></div>"
                            }
                            T += '<div class="heading-label">min</div></div>';
                            if (O) T += '<div class="heading-colon">:</div>';
                            T += '<div class="heading-digit">';
                            sNumber = p.toString();
                            for (var M = 0, _ = sNumber.length; M < _; M += 1) {
                                seconds_i = +sNumber.charAt(M);
                                if (_ < 2) T += '<div class="numbers"><div class="heading-number">0</div></div>';
                                T += '<div class="numbers"><div class="heading-number">' + seconds_i + "</div></div>"
                            }
                            T += '<div class="heading-label">sec</div></div>'
                        }
                    }
                    break;
                default:
                    break
            }
            T += "</div>";
            e(s).html(T)
        }
        setTimeout(function() {
            e.fn.serverTime.tickSecond(t, r, i, s, o, u, a, f, l)
        }, 1e3)
    };
    e.fn.serverTime.adjustTime = function(e, t, n) {
        var r = new Date(n);
        var i;
        i = parseInt(r.getTime()) + parseInt(e);
        return i
    };
    var r = function() {
        var e = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
            t = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
            n = /[^-+\dA-Z]/g,
            i = function(e, t) {
                e = String(e);
                t = t || 2;
                while (e.length < t) e = "0" + e;
                return e
            };
        return function(s, o, u) {
            var a = r;
            if (arguments.length == 1 && (typeof s == "string" || s instanceof String) && !/\d/.test(s)) {
                o = s;
                s = undefined
            }
            s = s ? new Date(s) : new Date;
            if (isNaN(s)) throw new SyntaxError("invalid date");
            o = String(a.masks[o] || o || a.masks["default"]);
            if (o.slice(0, 4) == "UTC:") {
                o = o.slice(4);
                u = true
            }
            var f = u ? "getUTC" : "get",
                l = s[f + "Date"](),
                c = s[f + "Day"](),
                h = s[f + "Month"](),
                p = s[f + "FullYear"](),
                d = s[f + "Hours"](),
                v = s[f + "Minutes"](),
                m = s[f + "Seconds"](),
                g = s[f + "Milliseconds"](),
                y = u ? 0 : s.getTimezoneOffset(),
                b = {
                    d: l,
                    dd: i(l),
                    ddd: a.i18n.dayNames[c],
                    dddd: a.i18n.dayNames[c + 7],
                    m: h + 1,
                    mm: i(h + 1),
                    mmm: a.i18n.monthNames[h],
                    mmmm: a.i18n.monthNames[h + 12],
                    yy: String(p).slice(2),
                    yyyy: p,
                    h: d % 12 || 12,
                    hh: i(d % 12 || 12),
                    H: d,
                    HH: i(d),
                    M: v,
                    MM: i(v),
                    s: m,
                    ss: i(m),
                    l: i(g, 3),
                    L: i(g > 99 ? Math.round(g / 10) : g),
                    t: d < 12 ? "a" : "p",
                    tt: d < 12 ? "am" : "pm",
                    T: d < 12 ? "A" : "P",
                    TT: d < 12 ? "AM" : "PM",
                    Z: u ? "UTC" : (String(s).match(t) || [""]).pop().replace(n, ""),
                    o: (y > 0 ? "-" : "+") + i(Math.floor(Math.abs(y) / 60) * 100 + Math.abs(y) % 60, 4),
                    S: ["th", "st", "nd", "rd"][l % 10 > 3 ? 0 : (l % 100 - l % 10 != 10) * l % 10]
                };
            return o.replace(e, function(e) {
                return e in b ? b[e] : e.slice(1, e.length - 1)
            })
        }
    }();
    r.masks = {
        "default": "ddd mmm dd yyyy HH:MM:ss",
        shortDate: "m/d/yy",
        mediumDate: "mmm d, yyyy",
        longDate: "mmmm d, yyyy",
        fullDate: "dddd, mmmm d, yyyy",
        shortTime: "h:MM TT",
        mediumTime: "h:MM:ss TT",
        longTime: "h:MM:ss TT Z",
        isoDate: "yyyy-mm-dd",
        isoTime: "HH:MM:ss",
        isoDateTime: "yyyy-mm-dd'T'HH:MM:ss",
        isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
    };
    r.i18n = {
        dayNames: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
    };
    Date.prototype.format = function(e, t) {
        return r(this, e, t)
    }
})(jQuery);
function Tab(container, handler, pane, options) {
	this.container = $(container);
	this.handle = $(handler);
	this.panel = $(pane);
	this.count = this.handle.length;
	this.timer = null;
	this.eTime = null;
	this.options = $.extend({
		auto : false,
		delay : 4,
		event : 'click',
		index : 1
	}, options);
	this.init();
};

Tab.prototype = {
	init : function() {
		var that = this, op = this.options, auto = !!op.auto;
		this.handle.bind(op.event, this._trigger(this));
		this._show(op.index);
		if (auto) {
			this._auto();
			this.container.click(function() {
				that._stop();
			}, function() {
				that._auto();
			});
		}
	},
	_trigger : function(o) {
		return function(e) {
			var index, op = o.options, handle = o.handle;
			if (op.index === (handle.index(this) + 1)) {
				return;
			}
			index = op.index = handle.index(this) + 1;
			o._show(index);
		};
	},
	_show : function(i) {
		this.handle.removeClass('curr').eq(i - 1).addClass('curr');
		this.panel.css("display", "none").eq(i - 1).css("display", "block");
	},
	_auto : function() {
		var that = this, op = that.options;
		this.timer = setTimeout(function() {
			op.index = op.index < that.count ? ++op.index : 1;
			that._show(op.index);
			that._auto();
		}, op.delay * 1000);
	},
	_stop : function() {
		clearTimeout(this.timer);
	}
}

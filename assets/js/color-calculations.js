function _twentyTwentyColor(t,o){return this.backgroundColor=t,this.accentHue=o,this.bgColorObj=new Color(t),this.textColorObj=this.bgColorObj.getMaxContrastColor(),this.textColor=this.textColorObj.toCSS(),this.isDark=.5>this.bgColorObj.toLuminosity(),this.isLight=!this.isDark,this}function twentyTwentyColor(t,o){var r=new _twentyTwentyColor(t,o);return r.setAccentColorsArray(),r}_twentyTwentyColor.prototype.setAccentColorsArray=function(){var t,o,r,n,e,s,c,i=this;for(this.accentColorsArray=[],t=65;t<=100;t+=2)for(o=30;o<=80;o+=2)n=void 0,e=void 0,s=void 0,c=void 0,c=new Color({h:i.accentHue,s:t,l:o}),4.5>(n={color:c,contrastBackground:c.getDistanceLuminosityFrom(i.bgColorObj),contrastText:c.getDistanceLuminosityFrom(i.textColorObj)}).contrastBackground||3>n.contrastText||(n.score=(e=n.contrastBackground,s=n.contrastText,(7>=e?0:7-e)+(3>=s?0:3-s)),i.accentColorsArray.push(n));return(r=this.accentColorsArray.filter((function(t){return 7<=t.contrastBackground}))).length&&(this.accentColorsArray=r),this.accentColorsArray.sort((function(t,o){return t.score-o.score})),this},_twentyTwentyColor.prototype.getTextColor=function(){return this.textColor},_twentyTwentyColor.prototype.getAccentColor=function(){return this.accentColorsArray[0]?this.accentColorsArray[0].color:new Color("hsl("+this.accentHue+",75%,50%)").getReadableContrastingColor(this.bgColorObj,4.5)};
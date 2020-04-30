import "./blocks.style.sass";

require("es6-promise").polyfill();
import cssVars from "css-vars-ponyfill";
cssVars({ shadowDOM: true });

import "./blocks/headline/frontend";

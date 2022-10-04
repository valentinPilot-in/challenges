"use strict";(globalThis.webpackChunk_wcAdmin_webpackJsonp=globalThis.webpackChunk_wcAdmin_webpackJsonp||[]).push([[8851],{78047:(e,t,o)=>{o.d(t,{U:()=>N,e:()=>E});var a=o(69307),c=o(83849),s=o.n(c),n=o(59838),i=o(76292),r=o.n(i),l=o(7862),m=o.n(l),d=o(86020),_=o(55609),u=o(92819);class p extends a.Component{render(){const{className:e,hasAction:t,hasDate:o,hasSubtitle:c,lines:n}=this.props,i=s()("woocommerce-activity-card is-loading",e);return(0,a.createElement)("div",{className:i,"aria-hidden":!0},(0,a.createElement)("span",{className:"woocommerce-activity-card__icon"},(0,a.createElement)("span",{className:"is-placeholder"})),(0,a.createElement)("div",{className:"woocommerce-activity-card__header"},(0,a.createElement)("div",{className:"woocommerce-activity-card__title is-placeholder"}),c&&(0,a.createElement)("div",{className:"woocommerce-activity-card__subtitle is-placeholder"}),o&&(0,a.createElement)("div",{className:"woocommerce-activity-card__date"},(0,a.createElement)("span",{className:"is-placeholder"}))),(0,a.createElement)("div",{className:"woocommerce-activity-card__body"},(0,u.range)(n).map((e=>(0,a.createElement)("span",{className:"is-placeholder",key:e})))),t&&(0,a.createElement)("div",{className:"woocommerce-activity-card__actions"},(0,a.createElement)("span",{className:"is-placeholder"})))}}p.propTypes={className:m().string,hasAction:m().bool,hasDate:m().bool,hasSubtitle:m().bool,lines:m().number},p.defaultProps={hasAction:!1,hasDate:!1,hasSubtitle:!1,lines:1};const E=p;class N extends a.Component{getCard(){const{actions:e,className:t,children:o,date:c,icon:n,subtitle:i,title:l,unread:m}=this.props,_=s()("woocommerce-activity-card",t),u=Array.isArray(e)?e:[e],p=/\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}/.test(c)?r().utc(c).fromNow():c;return(0,a.createElement)("section",{className:_},m&&(0,a.createElement)("span",{className:"woocommerce-activity-card__unread"}),n&&(0,a.createElement)("span",{className:"woocommerce-activity-card__icon","aria-hidden":!0},n),l&&(0,a.createElement)("header",{className:"woocommerce-activity-card__header"},(0,a.createElement)(d.H,{className:"woocommerce-activity-card__title"},l),i&&(0,a.createElement)("div",{className:"woocommerce-activity-card__subtitle"},i),p&&(0,a.createElement)("span",{className:"woocommerce-activity-card__date"},p)),o&&(0,a.createElement)(d.Section,{className:"woocommerce-activity-card__body"},o),e&&(0,a.createElement)("footer",{className:"woocommerce-activity-card__actions"},u.map(((e,t)=>(0,a.cloneElement)(e,{key:t})))))}render(){const{onClick:e}=this.props;return e?(0,a.createElement)(_.Button,{className:"woocommerce-activity-card__button",onClick:e},this.getCard()):this.getCard()}}N.propTypes={actions:m().oneOfType([m().arrayOf(m().element),m().element]),onClick:m().func,className:m().string,children:m().node,date:m().string,icon:m().node,subtitle:m().node,title:m().oneOfType([m().string,m().node]),unread:m().bool},N.defaultProps={icon:(0,a.createElement)(n.Z,{size:48}),unread:!1}},11640:(e,t,o)=>{o.r(t),o.d(t,{InboxPanel:()=>n,default:()=>i});var a=o(69307),c=o(17180),s=o(28655);const n=e=>{let{hasAbbreviatedNotifications:t,thingsToDoNextCount:o}=e;return(0,a.createElement)("div",{className:"woocommerce-notification-panels"},t&&(0,a.createElement)(s.vn,{thingsToDoNextCount:o}),(0,a.createElement)(c.Z,{showHeader:!1}))},i=n},17180:(e,t,o)=>{o.d(t,{Z:()=>y});var a=o(69307),c=o(65736),s=o(86020),n=o(55609),i=o(67221),r=o(9818),l=o(14599),m=o(82418),d=o(83786),_=o(14812),u=o(76292),p=o.n(u),E=o(78047),N=o(65933),w=o(70481);const h=e=>{let{onClose:t}=e;const{createNotice:o}=(0,r.useDispatch)("core/notices"),{batchUpdateNotes:s,removeAllNotes:m}=(0,r.useDispatch)(i.NOTES_STORE_NAME);return(0,a.createElement)(a.Fragment,null,(0,a.createElement)(n.Modal,{title:(0,c.__)("Dismiss all messages","woocommerce"),className:"woocommerce-inbox-dismiss-all-modal",onRequestClose:t},(0,a.createElement)("div",{className:"woocommerce-inbox-dismiss-all-modal__wrapper"},(0,a.createElement)("div",{className:"woocommerce-usage-modal__message"},(0,c.__)("Are you sure? Inbox messages will be dismissed forever.","woocommerce")),(0,a.createElement)("div",{className:"woocommerce-usage-modal__actions"},(0,a.createElement)(n.Button,{onClick:t},(0,c.__)("Cancel","woocommerce")),(0,a.createElement)(n.Button,{isPrimary:!0,onClick:()=>{(async()=>{(0,l.recordEvent)("wcadmin_inbox_action_dismissall",{});try{const e=await m({status:"unactioned"});o("success",(0,c.__)("All messages dismissed","woocommerce"),{actions:[{label:(0,c.__)("Undo","woocommerce"),onClick:()=>{s(e.map((e=>e.id)),{is_deleted:0})}}]})}catch(e){o("error",(0,c.__)("Messages could not be dismissed","woocommerce")),t()}})(),t()}},(0,c.__)("Yes, dismiss all","woocommerce"))))))},g=(e,t)=>{(0,l.recordEvent)("inbox_action_click",{note_name:e.name,note_title:e.title,note_content_inner_link:t})};let b=!1;const v={page:1,per_page:i.QUERY_DEFAULTS.pageSize,status:"unactioned",type:i.QUERY_DEFAULTS.noteTypes,orderby:"date",order:"desc",_fields:["id","name","title","content","type","status","actions","date_created","date_created_gmt","layout","image","is_deleted","is_read","locale"]},y=e=>{let{showHeader:t=!0}=e;const{createNotice:o}=(0,r.useDispatch)("core/notices"),{removeNote:u,updateNote:y,triggerNoteAction:C}=(0,r.useDispatch)(i.NOTES_STORE_NAME),{isError:k,isResolvingNotes:x,isBatchUpdating:A,notes:D}=(0,r.useSelect)((e=>{const{getNotes:t,getNotesError:o,isResolving:a,isNotesRequesting:c}=e(i.NOTES_STORE_NAME),s=p()("2022-01-11","YYYY-MM-DD").valueOf(),n=["en_US","en_AU","en_CA","en_GB","en_ZA"];return{notes:t(v).map((e=>{const t=p()(e.date_created_gmt,"YYYY-MM-DD").valueOf();return n.includes(e.locale)&&t>=s?{...e,content:(0,N.r7)(e.content,320)}:e})),isError:Boolean(o("getNotes",[v])),isResolvingNotes:a("getNotes",[v]),isBatchUpdating:c("batchUpdateNotes")}})),[f,S]=(0,a.useState)(!1);if(k){const e=(0,c.__)("There was an error getting your inbox. Please try again.","woocommerce"),t=(0,c.__)("Reload","woocommerce"),o=()=>{window.location.reload()};return(0,a.createElement)(s.EmptyContent,{title:e,actionLabel:t,actionURL:null,actionCallback:o})}const T=(0,N.kS)(D);return(0,a.createElement)(a.Fragment,null,f&&(0,a.createElement)(h,{onClose:()=>{S(!1)}}),(0,a.createElement)("div",{className:"woocommerce-homepage-notes-wrapper"},(x||A)&&(0,a.createElement)(s.Section,null,(0,a.createElement)(_.InboxNotePlaceholder,{className:"banner message-is-unread"})),(0,a.createElement)(s.Section,null,!x&&!A&&(e=>{let{hasNotes:t,isBatchUpdating:o,notes:i,onDismiss:r,onNoteActionClick:u,setShowDismissAllModal:p,showHeader:N=!0}=e;if(o)return;if(!t)return(0,a.createElement)(E.U,{className:"woocommerce-empty-activity-card",title:(0,c.__)("Your inbox is empty","woocommerce"),icon:!1},(0,c.__)("As things begin to happen in your store your inbox will start to fill up. You'll see things like achievements, new feature announcements, extension recommendations and more!","woocommerce"));b||((0,l.recordEvent)("inbox_panel_view",{total:i.length}),b=!0);const h=(0,w.GG)(),v=e=>{(0,l.recordEvent)("inbox_note_view",{note_content:e.content,note_name:e.name,note_title:e.title,note_type:e.type,screen:h})},y=Object.keys(i).map((e=>i[e]));return(0,a.createElement)(n.Card,{size:"large"},N&&(0,a.createElement)(n.CardHeader,{size:"medium"},(0,a.createElement)("div",{className:"wooocommerce-inbox-card__header"},(0,a.createElement)(_.Text,{size:"20",lineHeight:"28px",variant:"title.small"},(0,c.__)("Inbox","woocommerce")),(0,a.createElement)(s.Badge,{count:y.length})),(0,a.createElement)(s.EllipsisMenu,{label:(0,c.__)("Inbox Notes Options","woocommerce"),renderContent:e=>{let{onToggle:t}=e;return(0,a.createElement)("div",{className:"woocommerce-inbox-card__section-controls"},(0,a.createElement)(n.Button,{onClick:()=>{p(!0),t()}},(0,c.__)("Dismiss all","woocommerce")))}})),(0,a.createElement)(m.Z,{role:"menu"},y.map((e=>{const{id:t,is_deleted:o}=e;return o?null:(0,a.createElement)(d.Z,{key:t,timeout:500,classNames:"woocommerce-inbox-message"},(0,a.createElement)(_.InboxNoteCard,{key:t,note:e,onDismiss:r,onNoteActionClick:u,onBodyLinkClick:g,onNoteVisible:v}))}))))})({hasNotes:T,isBatchUpdating:A,notes:D,onDismiss:e=>{const t=(0,w.GG)();(0,l.recordEvent)("inbox_action_dismiss",{note_name:e.name,note_title:e.title,note_name_dismiss_all:!1,note_name_dismiss_confirmation:!0,screen:t});const a=e.id;try{u(a),o("success",(0,c.__)("Message dismissed","woocommerce"),{actions:[{label:(0,c.__)("Undo","woocommerce"),onClick:()=>{y(a,{is_deleted:0})}}]})}catch(e){o("error",(0,c._n)("Message could not be dismissed","Messages could not be dismissed",1,"woocommerce"))}},onNoteActionClick:(e,t)=>{C(e.id,t.id)},setShowDismissAllModal:S,showHeader:t}))))}}}]);
<template>
  <div class="bg-whiteColor rounded-md border-[1.5px] border-borderColor focus-within:border-primaryColor">
    <div v-if="editor" class="buttons flex items-center flex-wrap gap-x-2 gap-y-1 text-headingColor px-4 py-2 border-b-[1.5px] border-borderColor">
      <button
        @click.prevent="editor.chain().focus().toggleBold().run()"
        :disabled="!editor.can().chain().focus().toggleBold().run()"
        :class="{ 'bg-gray-300': editor.isActive('bold') }"
        class="p-1 rounded"
      >
        <BoldIcon title="Bold" />
      </button>
      <button
        @click.prevent="editor.chain().focus().toggleItalic().run()"
        :disabled="!editor.can().chain().focus().toggleItalic().run()"
        :class="{ 'bg-gray-300': editor.isActive('italic') }"
        class="p-1 rounded"
      >
        <ItalicIcon title="Italic" />
      </button>
      <button @click.prevent="editor.chain().focus().toggleUnderline().run()" :class="{ 'bg-gray-300': editor.isActive('underline') }" class="p-1 rounded">
        <UnderlineIcon title="Underline" />
      </button>
      <button
        @click.prevent="editor.chain().focus().toggleHeading({ level: 1 }).run()"
        :class="{ 'bg-gray-300': editor.isActive('heading', { level: 1 }) }"
        class="p-1 rounded-none"
      >
        <H1Icon title="H1" />
      </button>
      <button
        @click.prevent="editor.chain().focus().toggleHeading({ level: 2 }).run()"
        :class="{ 'bg-gray-300': editor.isActive('heading', { level: 2 }) }"
        class="p-1 rounded"
      >
        <H2Icon title="H2" />
      </button>
      <button @click.prevent="setLink" :class="{ 'bg-gray-300': editor.isActive('link') }" class="p-1 rounded">
        <LinkIcon title="Link" />
      </button>
      <button
        @click.prevent="editor.chain().focus().setTextAlign('left').run()"
        :class="{ 'bg-gray-300': editor.isActive({ textAlign: 'left' }) }"
        class="p-1 rounded"
      >
        <FormatLeftIcon title="Format Left" />
      </button>
      <button
        @click.prevent="editor.chain().focus().setTextAlign('center').run()"
        :class="{ 'bg-gray-300': editor.isActive({ textAlign: 'center' }) }"
        class="p-1 rounded"
      >
        <FormatCenterIcon title="Format Center" />
      </button>
      <button
        @click.prevent="editor.chain().focus().setTextAlign('right').run()"
        :class="{ 'bg-gray-300': editor.isActive({ textAlign: 'right' }) }"
        class="p-1 rounded"
      >
        <FormatRightIcon title="Format Right" />
      </button>

      <button @click.prevent="editor.chain().focus().toggleBulletList().run()" :class="{ 'bg-gray-300': editor.isActive('bulletList') }" class="p-1 rounded">
        <ListIcon title="Bullet List" />
      </button>
      <button @click.prevent="editor.chain().focus().toggleOrderedList().run()" :class="{ 'bg-gray-300': editor.isActive('orderedList') }" class="p-1 rounded">
        <OrderedListIcon title="Ordered List" />
      </button>
      <button @click.prevent="editor.chain().focus().toggleBlockquote().run()" :class="{ 'bg-gray-300': editor.isActive('blockquote') }" class="p-1 rounded">
        <BlockquoteIcon title="Blockquote" />
      </button>
      <button
        @click.prevent="editor.chain().focus().toggleCode().run()"
        :disabled="!editor.can().chain().focus().toggleCode().run()"
        :class="{ 'bg-gray-300': editor.isActive('code') }"
        class="p-1 rounded"
      >
        <CodeIcon title="Code" />
      </button>
      <button @click.prevent="editor.chain().focus().setHorizontalRule().run()" class="p-1 rounded">
        <HorizontalRuleIcon title="Horizontal Rule" />
      </button>
      <button @click.prevent="editor.chain().focus().undo().run()" :disabled="!editor.can().chain().focus().undo().run()" class="p-1 rounded">
        <UndoIcon title="Undo" />
      </button>
      <button @click.prevent="editor.chain().focus().redo().run()" :disabled="!editor.can().chain().focus().redo().run()" class="p-1 rounded">
        <RedoIcon title="Redo" />
      </button>
    </div>
    <EditorContent :editor="editor" />
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import Underline from '@tiptap/extension-underline'
import TextAlign from '@tiptap/extension-text-align'
import Link from '@tiptap/extension-link'

import BoldIcon from 'vue-material-design-icons/FormatBold.vue'
import ItalicIcon from 'vue-material-design-icons/FormatItalic.vue'
import UnderlineIcon from 'vue-material-design-icons/FormatUnderline.vue'
import H1Icon from 'vue-material-design-icons/FormatHeader1.vue'
import H2Icon from 'vue-material-design-icons/FormatHeader2.vue'
import ListIcon from 'vue-material-design-icons/FormatListBulleted.vue'
import OrderedListIcon from 'vue-material-design-icons/FormatListNumbered.vue'
import BlockquoteIcon from 'vue-material-design-icons/FormatQuoteClose.vue'
import CodeIcon from 'vue-material-design-icons/CodeTags.vue'
import HorizontalRuleIcon from 'vue-material-design-icons/Minus.vue'
import UndoIcon from 'vue-material-design-icons/ArrowULeftTop.vue'
import RedoIcon from 'vue-material-design-icons/ArrowURightTop.vue'
import FormatLeftIcon from 'vue-material-design-icons/FormatAlignLeft.vue'
import FormatCenterIcon from 'vue-material-design-icons/FormatAlignCenter.vue'
import FormatRightIcon from 'vue-material-design-icons/FormatAlignRight.vue'
import LinkIcon from 'vue-material-design-icons/LinkVariant.vue'

export default defineComponent({
  components: {
    EditorContent,
    BoldIcon,
    ItalicIcon,
    UnderlineIcon,
    H1Icon,
    H2Icon,
    ListIcon,
    OrderedListIcon,
    BlockquoteIcon,
    CodeIcon,
    HorizontalRuleIcon,
    UndoIcon,
    RedoIcon,
    FormatLeftIcon,
    FormatCenterIcon,
    FormatRightIcon,
    LinkIcon
  },
  props: {
    modelValue: String
  },
  setup(props, { emit }) {
    const editor = useEditor({
      editorProps: {
        attributes: {
          class: 'text-headingColor p-4 min-h-[12rem] max-h-[24rem] overflow-y-auto outline-none prose custom-scrollbar'
        },
        transformPastedText(text) {
          return text.toUpperCase()
        }
      },
      content: props.modelValue,
      onUpdate: ({ editor }) => {
        const content = editor.getHTML()
        const sanitizedContent = content === '<p></p>' ? null : content
        emit('update:modelValue', sanitizedContent)
      },
      extensions: [
        StarterKit,
        Underline,
        Link.configure({
          openOnClick: false,
          defaultProtocol: 'https'
        }),
        TextAlign.configure({
          types: ['heading', 'paragraph']
        })
      ]
    })

    return { editor }
  },
  methods: {
    setLink() {
      const previousUrl = this.editor.getAttributes('link').href
      const url = window.prompt('URL', previousUrl)

      if (url === null) {
        return
      }

      if (url === '') {
        this.editor.chain().focus().extendMarkRange('link').unsetLink().run()

        return
      }

      this.editor.chain().focus().extendMarkRange('link').setLink({ href: url }).run()
    }
  }
})
</script>

<style>
strong {
  font-weight: 800 !important;
}
</style>

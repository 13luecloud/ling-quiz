/// <reference types="vite/client" />

// Extend ImportMeta to include Vite's glob function
interface ImportMeta {
  glob: (pattern: string, options?: { eager?: boolean; as?: string }) => Record<string, any>
}

// Allow importing CSS files
declare module '*.css' {
  const content: string;
  export default content;
}